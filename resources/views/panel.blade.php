@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><h2>Velkommen! Hva vil du gjøre idag?</h2></div>

                <div class="panel-body">
                    <div>
                        <h3>Anmeldelser</h3>
                        <p><a href="reviews/create">Ny anmeldelse</a></p>
                        <p><a href="reviews/overview">Administrer egne anmeldelser</a>
                    </div>
                    <hr />
                    <div>
                        <h3>Annen administrasjon</h3>
                        <p><a href="apps">Administrer applikasjoner</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
