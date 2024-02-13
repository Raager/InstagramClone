@extends('layouts.app')

@section('content')
<div class="container">
    <form action="/p" enctype="multipart/form-data" method="post">
        @csrf
        <div class="col-8 offset-2">
        <div class="d-flex align-items-center justify-content-center">
            <h1 >Create a new Post</h1>
        </div>
    <div class="row mb-3">
            <label for="description" class="col-md-4 col-form-label"><strong>Post description</strong></label>
                <input id="description" 
                type="text" 
                name="description"
                class="form-control @error('description') is-invalid @enderror" 
                description="description" 
                value="{{ old('description') }}" 
                required autocomplete="description" autofocus>
                @error('description')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
        </div>
        <div class="row">
            <label for="image" class="col-md-4 col-form-label"><strong>Post image</strong></label>
            <input type="file" class="form-control-file" id="image" name="image">
            @error('image')
                    <strong>{{ $message }}</strong>
            @enderror
        </div>
        <div class="row pt-3">
            <button class="btn btn-primary">Add New Post</button>
        </div>
    </div>
</form>
</div>
@endsection
