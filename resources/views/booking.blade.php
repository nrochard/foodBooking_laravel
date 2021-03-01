@extends('layouts.default')

@section('content')




<div class="booking">
    <div class="container">

        @if ($errors->any())
        <div style="margin-top: 20px" class="alert alert-danger" role="alert">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
            </span>
        </div>
        @endif


        @if (session('status'))
        <div  style="margin-top: 20px" class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
        @endif

        @if (session('error'))
        <div  style="margin-top: 20px" class="alert alert-danger" role="alert">
            {{ session('error') }}
        </div>
        @endif


        <h1>Réserver un repas</h1>
        <h2>Il suffit de choisir un créneau et de vous présenter au restaurant.</h2>

        <div class="card" style="width: 100%;">
            <div class="card-body row justify-content-center align-items-center">
                <form action="/reservation" method="POST">
                    @csrf
                    <div class="form-group">
                        <label class="label_booking" for="email">Ton adresse email :</label>
                        <input type="email" class="form-control" id="email" name=email aria-describedby="emailHelp" placeholder="..." autocomplete="given-name" value="{{ old('email') }}">
                        <small id="emailHelp" class="form-text text-muted">Pour vous envoyer la confirmation de réservation.</small>
                    </div>
                    <div class="form-group">
                        <label class="label_booking" for="date">Date</label>
                        <input class="form-control" type="date" name="date" id="date" value="{{ old('date') }}">
                    </div>
                    <div class="row">
                        <label>Créneau :</label>
                        <div class="col-md-6">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="slot" value="10h30 à 11h" id="slot1">
                                <label class="form-check-label" for="slot1">
                                    10h30 à 11h
                                </label>
                                
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="slot" value="11h à 11h30" id="slot2">
                                <label class="form-check-label" for="slot2">
                                    11h à 11h30
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="slot" value="11h30 à 12h" id="slot3">
                                <label class="form-check-label" for="slot3">
                                    11h30 à 12h00
                                </label>
                                
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="slot" value="12h à 12h30" id="slot4">
                                <label class="form-check-label" for="slot4">
                                    12h00 à 12h30
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="slot" value="12h30 à 13h" id="slot5">
                                <label class="form-check-label" for="slot5">
                                    12h30 à 13h00
                                </label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="slot" value="16h à 16h30" id="slot6">
                                <label class="form-check-label" for="slot6">
                                    16h00 à 16h30
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="slot" value="16h30 à 17h" id="slot7">
                                <label class="form-check-label" for="slot7">
                                    16h30 à 17h00
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="slot"  value="17h à 17h30" id="slot8">
                                <label class="form-check-label" for="slot8">
                                    17h00 à 17h30
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="slot" value="17h30 à 18h">
                                <label class="form-check-label" for="slot">
                                    17h30 à 18h00
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="1" id="conditions" name="conditions">
                        <label class="form-check-label label_booking" for="conditions">
                            J'ai lu et j'accepte les <a href="#">conditions générales d'utilisation</a>.
                        </label>
                    </div>
                    <button type="submit" class="btn btn-book">Réserver</button>
                </form>
            </div>
        </div>
    </div>
</div>


</div>


@endsection