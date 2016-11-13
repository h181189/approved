@extends('layouts.app')

@section('content')
	<div class="container">
		@if (sizeof($reviews) == 0)
			<h2>Det er ingen anmeldelser her ennå!</h2>

			@if (Auth::user()->isEditor())
				<a href="/reviews/create">Skriv den første anmeldelsen!</a>
			@endif
		@else
			@foreach ($reviews as $review)
				<div class="col-md-5 col-md-offset-1">
					<a href="{{ $review->id }}">
						<div class="jumbotron">
							<h2>{{ $review->app->name }}</h2>
						</div>
					</a>
				</div>
			@endforeach
		@endif
	</div>
@endsection
