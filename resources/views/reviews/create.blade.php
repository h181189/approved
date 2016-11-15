@extends('layouts.app')

@section('content')
<div class="container-fluid">
	<div class="col-md-6 col-md-offset-3">
		<h1>Ny anmeldelse</h1>
		<p>
			<a href="/panel">Gå tilbake</a>
		</p>
		<hr />
		<form action="/reviews" method="POST">
			<div class="form-group">
				<label for="app">Navnet på applikasjonen</label>
				<input type="text" id="app" class="form-control" name="app" autofocus>
			</div>
			<hr />
			
			<div class="form-group">
				<label for="content">Innhold</label>
				<textarea name="content" id="content" cols="30" rows="10" class="form-control"></textarea>
			</div>
			<hr />
			<div class="container-fluid">
				<div class="col-md-4">
					<div class="form-group">
						<label for="appearence-rating">Brukervennlighet vurdering</label>
						<input type="number" name="interface_rating" class="form-control" step="10" min="0" max="100" value="50">
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<label for="functionality-rating">Funksjonalitet vurdering</label>
						<input type="number" name="functionality_rating" class="form-control" step="10" min="0" max="100" value="50">
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<label for="price-rating">Pris vurdering</label>
						<input type="number" name="price_rating" class="form-control" step="10" min="0" max="100" value="50">
					</div>
				</div>
			</div>
			
			<br />
			<div class="form-group">
				{{ csrf_field() }}
				<button class="btn btn-primary">Publiser</button>
			</div>
		</form>
	</div>
</div>
<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
<script>tinymce.init({ selector:'textarea' });</script>
@endsection
