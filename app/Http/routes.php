<?php

//import Modelnya dulu (berlaku di Controller juga)
use App\Post;
use App\User;

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
*/

//many to many
Route::get('/user/{id}/roles', function ($id) {
   $user = User::find($id);
    foreach ($user->roles as $role) {
        echo $role->name . '<br />';
    }
});