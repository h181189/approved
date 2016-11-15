@extends('layouts.app')

@section('content')
<div class="container">
	<h2>Oversikt over anmeldelser</h2>	
	<p>
		<a href="/panel">Bring meg til panelet!</a>
	</p>
	
	@if (sizeof($reviews) > 0)
		<table class="table table-bordered table-hover table-striped">
			<thead>
				<tr>
					<th>ID</th>
					<th>App</th>
					<th>Score</th>
					<th>Laget</th>
					<th>Oppdater</th>
					<th>Rediger</th>
				</tr>
			</thead>
			<tbody>
				@foreach ($reviews as $review)
				<tr>
					<td>{{ $review->id }}</td>
					<td>{{ $review->app->name }}</td>
					<td>{{ $review->score->total }}</td>
					<td>{{ date("d.m.Y G:i:s", strtotime($review->created_at)) }}</td>
					<td>{{ date("d.m.Y G:i:s", strtotime($review->updated_at)) }}</td>
					<td><a href="/reviews/{{ $review->id }}/edit">Rediger</a></td>
				</tr>
				@endforeach
			</tbody>
		</table>
	@else
		<a href="{{ url('/reviews/create') }}">Du har ikke skrevet en anmeldelse ennå! Gjør det. Nå.</a>
	@endif
</div>
@endsection
