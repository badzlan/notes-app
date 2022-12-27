@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center"><b>{{ __('Dashboard List') }}</div>

                <h5 class="card-header">
                    <a href="{{ route('todo.create') }}" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> Add Item</a>
                </h5>

                <div class="card-body">

                    <table class="table table-hover table-borderless">
                        <thead>
                            <th scope="col">Item</th>
                            <th scope="col"></th>
                        </thead>
                        <tbody>
                            @forelse ($todos as $todo)
                            <tr>
                                <td>{{ $todo->title }}</td>
                                <td>
                                    <a href="" class="btn btn-sm btn-outline-success"><i class="fa fa-edit"></i> Edit</a>
                                    <a href="" class="btn btn-sm btn-outline-danger"><i class="fa fa-trash"></i> Delete</a>
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
