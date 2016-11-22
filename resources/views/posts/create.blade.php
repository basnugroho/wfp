@extends('layouts.app')

@section('content')
	<h1>Create Post</h1>
	<form action="{{ URL::to('/posts') }}" method="post">
		<input type="text" name="title" placeholder="enter title">
		{{csrf_field()}}
		<input type="submit" name="submit">
	</form>
@endsection
@section('footer')
@endsection