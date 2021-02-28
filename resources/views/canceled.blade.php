@extends('layouts.default')

@section('content')

<div class="booking">
    <div class="container">
        @if (session('status'))
        <div style="margin-top: 20px" class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
        @endif

        <h1>Annulation de ta commande </h1>
        <h2>Si tu es sûr(e) de toi, clique sur le bouton pour confirmer.</h2>

        <div class="card canceled_card" style="width: 100%">
            <div class="card-body">
                <form action="/annulation/{{ $booking[0]->token }} " method="POST">
                    @csrf
                    <h5 class="card-title">Récapitulatif de ta réservation</h5>
                    <p class="card-text">Date : {{ $booking[0]->date }} </p>
                    <p class="card-text">Créneau : {{ $booking[0]->slot }} </p>
                    <button type="submit" class="btn btn-book">Confirmer</button>
                </form>
            </div>
        </div>
    </div>
</div>


@endsection