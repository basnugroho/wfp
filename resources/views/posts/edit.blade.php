@extends('layouts.app')

@section('content')
    <h1>Edit Post</h1>
    <form action="{{ URL::to('/posts/'.$post->id) }}" method="POST">

        <input type="hidden" name="_method" value="PUT">
        <input type="text" name="title" value="{{$post->title}}">
        {{csrf_field()}}
        <input type="submit" name="submit">
    </form>
    <h1>Delete Post</h1>
    <form action="{{ URL::to('/posts/'.$post->id) }}" method="POST">

        <input type="hidden" name="_method" value="DELETE">
        <input type="text" name="title" value="{{$post->title}}">
        {{csrf_field()}}
        <input type="submit" name="submit">
    </form>
@endsection
@section('footer')
@endsection