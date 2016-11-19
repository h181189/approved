@extends('layouts.app')

@section('content')

<div class="container">
	<div class="col-md-6 col-md-offset-3">
		<h1>{{ $review->app->name }}</h1>
		<p>Publisert av {{ $review->user->name }}, {{ $review->updated_at->format('d.m.Y G:i:s') }}.</p>
		@if (strlen($review->app->url) !== 0)
			<p><a href="{{ $review->app->url }}">{{ $review->app->name }} sin nettside</a>
		@endif
		<hr>
		<article>{!! $review->content !!}</article>
		<h3>Poengsum: {{ $review->score->total }} / 100</h3>
		<hr>
	</div>
	<div class="col-md-6 col-md-offset-3">
		@if (sizeof($review->comment) == 0)
			<h3>Ingen kommentarer</h3>
		@else
			<h3>Kommentarer</h3>
			<hr>
			<div class="container-fluid">
				@foreach ($review->comment as $comment)
					@if (strlen($comment) > 0)
						<div class="row">
							<p><strong>{{ $comment->user->name }}</strong> {{ $comment->content }}</p>
							<p>{{ date("d.m.Y G:i:s", strtotime($comment->created_at)) }}</p>
							<br>
						</div>
					@endif
				@endforeach
			</div>
		@endif
		<hr>
	</div>
	<div class="col-md-6 col-md-offset-3">
		@if (Auth::user())
			<form method="POST">
				<div class="form-group">
					<textarea name="content" rows="10" class="form-control" placeholder="Skriv en kommentar..."></textarea>
				</div>
				<div class="form-group">
					{{ csrf_field() }}
					<input type="hidden" name="review" value="{{ $review->id }}">
					<button class="btn btn-primary">Send inn kommentar</button>
				</div>
			</form>
		@endif
		<br><br>
	</div>
	
</div>
		
@endsection
