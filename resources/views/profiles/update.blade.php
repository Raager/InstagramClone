@extends('layouts.app')

@section('content')
<div class="container">
<form action="/profile/{{$user->id}}" enctype="multipart/form-data" method="post">
        @csrf
        @method('PATCH')

        <div class="col-8 offset-2">
        <div class="d-flex align-items-center justify-content-center">
            <h1 >Edit Profile</h1>
        </div>
    <div class="row mb-3">
            <label for="title" class="col-md-4 col-form-label"><strong>Title</strong></label>
                <input id="title" 
                type="text" 
                name="title"
                class="form-control @error('title') is-invalid @enderror" 
                value="{{ old('title') ?? $user->profile->title}}" 
                required autocomplete="title" autofocus>
                @error('title')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
        </div>
    <div class="row mb-3">
            <label for="description" class="col-md-4 col-form-label"><strong>Description</strong></label>
                <input id="description" 
                type="text" 
                name="description"
                class="form-control @error('description') is-invalid @enderror" 
                value="{{ old('description') ?? $user->profile->description}}" 
                required autocomplete="description" autofocus>
                @error('description')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
        </div>
    <div class="row mb-3">
            <label for="url" class="col-md-4 col-form-label"><strong>URL</strong></label>
                <input id="url" 
                type="text" 
                name="url"
                class="form-control @error('url') is-invalid @enderror" 
                value="{{ old('url') ?? $user->profile->url}}" 
                required autocomplete="url" autofocus>
                @error('url')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
        </div>
        <div class="row">
            <label for="image" class="col-md-4 col-form-label"><strong>Change image</strong></label>
            <input type="file" class="form-control-file" id="image" name="image">
            @error('image')
                    <strong>{{ $message }}</strong>
            @enderror
        </div>
        <div class="row pt-3">
            <button class="btn btn-primary">Update Profile</button>
        </div>
    </div>
</form>
</div>
@endsection
