@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center"><b>Add Notes</b></div>

                <h5 class="card-header">
                    <a href="{{ route('note.index') }}" class="btn btn-sm btn-outline-primary"><i class="fa fa-arrow-left"></i> Go Back</a>
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

                    @if(session()->has('success'))
                        
                        <div class="alert alert-success" role="alert">
                            {{ session()->get('success') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('note.store') }}">
                        @csrf

                        <div class="form-group row mb-2">
                            <label for="title" class="col-form-label text-md-right">Title</label>

                            <input id="title" type="title" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('email') }}" required autocomplete="title" autofocus>

                            @error('title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group row mb-3">
                            <label for="description" class="col-form-label text-md-right">Notes</label>

                            <input name="description" id="description" type="hidden">
                            <trix-editor input="description"></trix-editor>

                            @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group row mb-3">
                            <div class="text-end">
                                <button type="submit" class="btn btn-primary">
                                    Submit
                                </button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
