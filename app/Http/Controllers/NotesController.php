<?php

namespace App\Http\Controllers;

use App\Models\Notes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $notes = Notes::where('user_id', Auth::user()->id)->orderBy('created_at', 'desc')->get();
        return view('home', compact('notes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('add_note');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'completed' => 'nullable',
        ]);

        $note = new Notes;
        $note->title = $request->input('title');
        $note->description = $request->input('description');

        if($request->has('completed')){
            $note->completed = true;
        }

        $note->user_id = Auth::user()->id;

        $note->save();

        return redirect()->route('note.index')->with('success', 'Item created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $note = Notes::where('id', $id)->where('user_id', Auth::user()->id)->first();
        if(!$note){
            abort(404);
        }
        return view('delete_note', compact('note'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $note = Notes::where('id', $id)->where('user_id', Auth::user()->id)->first();
        if(!$note){
            abort(404);
        }
        return view('edit_note', compact('note'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'completed' => 'nullable',
        ]);

        $note = Notes::find($id);
        $note->title = $request->input('title');
        $note->description = $request->input('description');

        if($request->has('completed')){
            $note->completed = true;
        }
        else{
            $note->completed = false;

        }

        $note->save();

        return redirect()->route('note.index')->with('success', 'Item updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $note = Notes::where('id', $id)->where('user_id', Auth::user()->id)->first();
        $note->delete();
        return redirect()->route('note.index')->with('success', 'Item deleted successfully!');
    }
}
