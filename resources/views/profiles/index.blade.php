@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row">
    <div class="col-3 p-5">
        <img src="{{$user->profile->profileImage()}}" class="rounded-circle" width="200px">
    </div>
    <div class="col-9 pt-5">
        <div class="d-flex justify-content-between align-items-baseline">
            <div class="d-flex align-items-center pb-4">
                <div class="h3">{{$user->username}}</div>
                <follow-button user-id="{{$user->id}}" follows="{{$follows}}"></follow-button> 
            </div>
            @can('update', $user->profile)
            <a href="/p/create">Add Post</a>
            @endcan
        </div>
        @can('update', $user->profile)
            <a href="/profile/{{$user->id}}/update">Edit Profile</a>
        @endcan
        <div class="d-flex">
            <div style="padding-right: 30px;" class="pr-5"><strong style="padding-right: 5px;">{{$userPosts}}</strong>posts</div>
            <div style="padding-right: 30px;" class="pr-5"><strong style="padding-right: 5px;">{{$userFollowers}}</strong>followers</div>
            <div style="padding-right: 30px;" class="pr-5"><strong style="padding-right: 5px;">{{$userFollowing}}</strong>subscribes</div>
        </div>
        <div class="pt-4"><strong>{{$user->profile->title}}</strong></div>
        <div>{{$user->profile->description}}</div>
        <div><a href="{{$user->profile->url}}">{{$user->profile->url}}</a></div>
    </div>
    </div>
    <div class="row pt-4">
        @foreach($user->posts as $post)
        <div class="col-4 pb-4">
            <a href="/p/{{$post->id}}">
                <img src="/storage/{{$post->image}}" class="w-100">
            </a>
        </div>
        @endforeach
       
    </div>
</div>
@endsection
