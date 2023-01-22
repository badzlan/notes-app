@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center"><b>{{ __('Dashboard Notes') }}</b></div>

                <h5 class="card-header">
                    <a href="{{ route('note.create') }}" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> Add Notes</a>
                </h5>

                <div class="card-body">
                    @if(session()->has('success'))
                        
                        <div class="alert alert-success" role="alert">
                            {{ session()->get('success') }}
                        </div>
                    @endif
                    
                    <table class="table table-hover table-borderless">
                        <thead>
                            <th scope="col">Notes List</th>
                            <th scope="col"></th>
                        </thead>
                        <tbody>
                            @forelse ($notes as $note)
                            <tr>
                                @if ($note->completed)
                                    <td><a href="{{ route('note.edit', $note->id) }}" style="color: black; text-decoration: none;"><s>{{ $note->title }}</s></a></td>
                                @else
                                    <td><a href="{{ route('note.edit', $note->id) }}" style="color: black; text-decoration: none;">{{ $note->title }}</a></td>
                                @endif

                                <td class="text-end">
                                    <a href="{{ route('note.edit', $note->id) }}" class="btn btn-sm btn-outline-success"><i class="fa fa-edit"></i> Edit</a>
                                    <a href="{{ route('note.show', $note->id) }}" class="btn btn-sm btn-outline-danger"><i class="fa fa-trash"></i> Delete</a>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td>No Notes yet!</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
