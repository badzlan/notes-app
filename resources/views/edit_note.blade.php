@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center"><b>Edit {{ $note->title }}</b></div>

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

                    <form method="POST" action="{{ route('note.update', $note->id) }}">
                        @csrf
                        @method('PUT')

                        <div class="form-group row mb-2">
                            <label for="title" class="col-form-label text-md-right">Title</label>

                            <input id="title" type="title" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ $note->title }}" required autocomplete="title" autofocus>

                            @error('title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group row mb-3">
                            <label for="description" class="col-form-label text-md-right">Notes</label>

                            <input name="description" id="description" type="hidden" value="{{ $note->description }}">
                            <trix-editor input="description"></trix-editor>
                            {{-- <textarea name="description" id="description" cols="30" rows="10" class="form-control @error('password') is-invalid @enderror" autocomplete="description" value="{{ $note->description }}" style="resize: none">{{ $note->description }}</textarea> --}}

                            @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group row mb-2">
                            <div class="form-check">
                                @if ($note->completed)
                                    <input class="form-check-input" type="checkbox" name="completed" id="completed" value="{{ $note->completed }}" checked>
                                @else
                                    <input class="form-check-input" type="checkbox" name="completed" id="completed" value="{{ $note->completed }}">
                                @endif

                                <label class="form-check-label" for="completed">
                                    Completed?
                                </label>
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <div class="text-end">
                                <button type="submit" class="btn btn-success">
                                    Update
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
