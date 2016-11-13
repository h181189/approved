@extends('layouts.app')

@section('content')

<div class="container">
	<div class="col-md-6 col-md-offset-3">
		<h1>{{ $review->app->name }}</h1>
		<article>{!! $review->content !!}</article>
		<p><a href="{{ $review->app->url }}">{{ $review->app->name }} sin nettisde</a>
		<p>Publisert av {{ $review->user->name }}, {{ $review->updated_at->format('d.m.Y') }}.</p>
	</div>
</div>
		
@endsection
