@extends('layouts.app')

@section('content')
<div class="container">
    @foreach($posts as $post)
    <div class="row">
        <div class="col-6 offset-3">
            <a href="/profile/{{$post->user->id}}">
                <img src="/storage/{{$post->image}}" class="w-100">
            </a>
        </div>
        <div class="row pt-2 pb-4">
            <div class="col-6 offset-3">
                <div>
                    <p>
                        <a href="/profile/{{$post->user->id}}">
                            <span class="fw-bold"><span class="text-dark">{{$post->user->username}}</span></span>
                        </a>
                        {{$post->description}}
                    </p>
                </div>
            </div>

        </div>
    </div>
    @endforeach
    <div class="row">
        <div class="col-12 d-flex justify-content-center">
            {{$posts->links('pagination::bootstrap-4')}}
        </div>
    </div>
</div>
@endsection
