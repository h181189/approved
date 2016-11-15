@extends('layouts.app')

@section('content')

<div class="container">
	<div class="col-md-6 col-md-offset-3">
		<h1>{{ $review->app->name }}</h1>
		<article>{!! $review->content !!}</article>
		@if (strlen($review->app->url) !== 0)
			<p><a href="{{ $review->app->url }}">{{ $review->app->name }} sin nettisde</a>
		@endif
		<h3>Poengsum: {{ $review->score->total }} / 100</h3>
		<p>Publisert av {{ $review->user->name }}, {{ $review->updated_at->format('d.m.Y') }}.</p>
	</div>
</div>
		
@endsection
