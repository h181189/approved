@extends('layouts.app')

@section('content')
<div class="container">
	<div class="col-md-6 col-md-offset-3">
		<h2>Edit {{ $app->name }}</h2>
		<form action="/apps/{{ $app->id }}" method="POST">

			<div class="form-group">
				<label for="name">Navn</label>
				<input type="text" name="name" class="form-control" autofocus value="{{ $app->name }}">
			</div>

			<div class="form-group">
				<label for="developer">Utvikler</label>
				<input type="text" name="developer" class="form-control" value="{{ $app->developer }}">
			</div>
			
			<div class="form-group">
				<label for="url">URL</label>
				<input type="text" name="url" class="form-control" value="{{ $app->url }}">
			</div>
			
			<div class="form-group">
				{{ method_field('PATCH') }}
				{{ csrf_field() }}
				<button class="btn btn-primary">Lagre</button>
			</div>
		</form>
		<form action="/apps/{{ $app->id }}" method="POST">
			<div class="form-group">
				<p class="text-warning">Dersom du sletter {{ $app->name }}, slettes alle anmeldelser og sammenlignelser til den.</p>
				{{ method_field('DELETE') }}
				{{ csrf_field() }}
				<button class="btn btn-danger">Slett</button>
			</div>
		</form>
	</div>
</div>
@endsection
