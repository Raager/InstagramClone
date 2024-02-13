<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;


class ProfilesController extends Controller
{
    public function index(User $user)
    {
        $follows = (auth()->user()) ? auth()->user()->following->contains($user->id) : false;

        $userPosts = Cache::remember('count.posts'. $user->id,
        now()->addSeconds(30),
        function() use ($user){
            return $user->posts->count();
        }
        );
        $userFollowing = Cache::remember('count.following'. $user->id,
        now()->addSeconds(30),
        function() use ($user){
            return $user->following->count();
        }
        );
        $userFollowers = Cache::remember('count.followers'. $user->id,
        now()->addSeconds(30),
        function() use ($user){
            return $user->profile->followers->count();
        }
        );

        return view('profiles/index', compact('user', 'follows', 'userPosts', 'userFollowing', 'userFollowers'));
    }

    public function update(User $user){
        $this->authorize('update', $user->profile);
        return view('profiles/update', compact('user'));
    }

    public function edit(User $user){
        $imagePath = $user->profile->image;
        $this->authorize('update', $user->profile);
        
        $data = request()->validate([
            'title' => 'required',
            'description' => 'required',
            'url' => 'url',
            'image' => ''
        ]);
        
        if(request('image')){
            $imagePath = request('image')->store('prfile', 'public');
            $manager = new ImageManager(new Driver());
            $image = $manager->read(public_path("storage/{$imagePath}"));
            $image = $image->cover(1000,1000);
            $image->save();
            
        }
        auth()->user()->profile->update(array_merge(
            $data,
            ['image' => $imagePath]
        ));

        return redirect("/profile/{$user->id}");
    }
}
