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
                        <label class="label_booking" for="email">Votre adresse email :</label>
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
                                <input class="form-check-input" type="radio" name="hour" value="10h30">
                                <label class="form-check-label" for="hour">
                                    10h30 à 11h
                                </label>
                                
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="hour" value="11h">
                                <label class="form-check-label" for="hour">
                                    11h à 11h30
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="hour" value="11h30">
                                <label class="form-check-label" for="hour">
                                    11h30 à 12h00
                                </label>
                                
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="hour" value="12h">
                                <label class="form-check-label" for="hour">
                                    12h00 à 12h30
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="hour" value="12h30">
                                <label class="form-check-label" for="hour">
                                    12h30 à 13h00
                                </label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="hour" value="16h">
                                <label class="form-check-label" for="hour">
                                    16h00 à 16h30
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="hour" value="16h30">
                                <label class="form-check-label" for="hour">
                                    16h30 à 17h00
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="hour"  value="17h">
                                <label class="form-check-label" for="hour">
                                    17h00 à 17h30
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="hour" value="17h30">
                                <label class="form-check-label" for="hour">
                                    17h30 à 18h00
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="1" id="conditions" name="conditions">
                        <label class="form-check-label label_booking" for="conditions">
                            J'ai lu et j'accepte les conditions générales d'utilisation
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