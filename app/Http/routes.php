<?php

//import Modelnya dulu (berlaku di Controller juga)
use App\Post;
use App\User;
use App\Role;
use App\Country;
use App\Photo;
use App\Tag;

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});


/*
|--------------------------------------------------------------------------
| Eloquent
|--------------------------------------------------------------------------
*/

//read
Route::get('/read', function () {
    $posts = Post::find(1);
    return $posts->title;
});

//read with condition
Route::get('findwhere', function () {
    $posts = Post::where('id', 2)->orderBy('id', 'desc')->take(1)->get();

    foreach ($posts as $post) {
        return $post->content;
    }

});

//findorfail
Route::get('findmore', function () {
    //$posts = Post::findOrFail(4);
    //return $posts;

    $posts = Post::where('user_count', '<', 50)->firstOrFail();
});

//insert
Route::get('insert', function () {
   DB::insert('INSERT INTO posts(title, content) VALUES (?, ?)', ['Laravel is awesome with Bas', 'Laravel is the best thing that happened to PHP, PERIOD']);
});

/*
|--------------------------------------------------------------------------
| Eloquent Relationship
|--------------------------------------------------------------------------
*/

//hasOne()
Route::get('/user/{id}/post', function ($id) {
    return User::find($id)->post->content;
});
//inverse-nya
Route::get('/post/{id}/user', function ($id) {
    return Post::find($id)->user->name;
});


Route::get('/posts', function () {
   $user = User::find(1);
    foreach ($user->posts as $post) {
        //kalo pakek return cuma muncul 1
        echo $post->title . '<br />';
    }
});


//many to many
Route::get('/user/{id}/roles', function ($id) {
   $user = User::find($id)->roles()->orderBy('id', 'desc')->get();
    foreach ($user as $roles) {
        echo $roles->name . '<br />';
    }
});

//accessing the intermediate table (pivot table)
Route::get('/user/pivot/', function () {
   $users = User::find(1);
    foreach ($users->roles as $role) {
        echo $role->pivot->created_at;
    }
});

//hasManyThrough()
Route::get('/user/country/{id}', function ($id) {
   $country = Country::find($id);
    foreach ($country->posts as $post) {
        echo $post->title . '<br />';
    }
});

//polymhorpic Relations
Route::get('user/photos', function () {
    $user = User::find(1);
    foreach ($user->photos as $photo) {
        return $photo->path;
    }
});

Route::get('post/{id}/photos', function ($id) {
    $post = Post::find($id);
    foreach ($post->photos as $photo) {
        echo $photo->path . '<br />';
    }
});

//polymhorpic inverse
Route::get('photo/{id}/post', function ($id) {
    $photo = Photo::findOrFail($id);
    return $photo;
});

//many to many polymhorpic
Route::get('/post/{id}/tag', function ($id) {
   $post = Post::find($id);
    foreach ($post->tags as $tag) {
        echo $tag->name;
    }
});

Route::get('/tag/post', function () {
   $tag = Tag::find(2);
    return $tag->name;
});