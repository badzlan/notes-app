@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center"><b>{{ __('Dashboard List') }}</b></div>

                <h5 class="card-header">
                    <a href="{{ route('todo.create') }}" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> Add Item</a>
                </h5>

                <div class="card-body">
                    @if(session()->has('success'))
                        
                        <div class="alert alert-success" role="alert">
                            {{ session()->get('success') }}
                        </div>
                    @endif
                    
                    <table class="table table-hover table-borderless">
                        <thead>
                            <th scope="col">Item</th>
                            <th scope="col"></th>
                        </thead>
                        <tbody>
                            @forelse ($todos as $todo)
                            <tr>
                                @if ($todo->completed)
                                    <td><a href="{{ route('todo.edit', $todo->id) }}" style="color: black; text-decoration: none;"><s>{{ $todo->title }}</s></a></td>
                                @else
                                    <td><a href="{{ route('todo.edit', $todo->id) }}" style="color: black; text-decoration: none;">{{ $todo->title }}</a></td>
                                @endif

                                <td class="text-end">
                                    <a href="{{ route('todo.edit', $todo->id) }}" class="btn btn-sm btn-outline-success"><i class="fa fa-edit"></i> Edit</a>
                                    <a href="{{ route('todo.show', $todo->id) }}" class="btn btn-sm btn-outline-danger"><i class="fa fa-trash"></i> Delete</a>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td>No Item!</td>
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
