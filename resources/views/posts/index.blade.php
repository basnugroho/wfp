@extends('layouts.app')

@section('content')
    <ul>
        @foreach($posts as $post)
            <!--<li><a href="{{URL::to('/posts/'.$post->id.'/edit')}}">{{$post->title}}</a></li>
             cara lain-->
            <li><a href="{{route('posts.edit', $post->id)}}">{{$post->title}}</a></li>
        @endforeach
    </ul>
@endsection

@section('footer')