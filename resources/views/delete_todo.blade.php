@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center"><b>Delete {{ $todo->title }}</b></div>

                <h5 class="card-header">
                    <a href="{{ route('todo.index') }}" class="btn btn-sm btn-outline-primary"><i class="fa fa-arrow-left"></i> Go Back</a>
                </h5>

                <div class="card-body mx-4">

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('todo.destroy', $todo->id) }}">
                        @csrf
                        @method('DELETE')

                        <div class="form-group row mb-3">
                            <div class="col-md-12">
                                <h4 class="text-center">
                                    Are you sure want to delete <b>{{ $todo->title }}</b>?
                                </h4>
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <div class="text-center">
                                <button type="submit" class="btn btn-danger">
                                    Delete
                                </button>
                                <a href="{{ route('todo.index') }}" class="btn btn-info">No</a>
                            </div>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
