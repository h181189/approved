@extends('layouts.app')

@section('content')
<div class="container">
	<h2>Oversikt over apper</h2>
	<a href="/panel">Gå tilbake</a>
	<table class="table table-bordered table-hover table-striped">
		<thead>
			<tr>
				<th>ID</th>
				<th>Navn</th>
				<th>Utvikler</th>
				<th>URL</th>
				<th>Laget</th>
				<th>Oppdatert</th>
				<th>Rediger</th>
			</tr>
		</thead>
		<tbody>
		<tbody>
		@if (sizeof($apps) !== 0)
			@foreach ($apps as $app)
				<tr>
					<td>{{ $app->id }}</td>
					<td>{{ $app->name }}</td>
					<td>{{ $app->developer }}</td>
					<td><a href="{{ $app->url }}" target="_blank">{{ $app->url }}</a></td>
					<td>{{ date("d.m.Y G:i:s", strtotime($app->created_at)) }}</td>
					<td>{{ date("d.m.Y G:i:s", strtotime($app->updated_at)) }}</td>
					<td><a href="/apps/{{ $app->id }}/edit">Rediger</a></td>
				</tr>
			@endforeach
		@endif
		<form action="/apps/" method="POST">
			{{ csrf_field() }}
			<tr>
				<td>#</td>
				<td><input type="text" name="name" autofocus autocomplete="off" class="form-control"/></td>
				<td><input type="text" name="developer" autocomplete="off" class="form-control"/></td>
				<td><input type="text" name="url" autocomplete="off" class="form-control"/></td>
				<td></td>
				<td></td>
				<td><button class="btn btn-primary">Legg til</button></td>
			</tr>
		</form>
		</tbody>
	</table>
</div>
@endsection
