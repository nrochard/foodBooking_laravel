@extends('layouts.default')

@section('content')




<div class="booking">
    <div class="container">
        <h1>Réserver un repas</h1>
        <h2>Il suffit de choisir un créneau et de vous présenter au restaurant.</h2>

        <div class="card" style="width: 100%;">
            <div class="card-body row justify-content-center align-items-center">
                <form>
                    <div class="form-group">
                        <label class="label_booking" for="exampleInputEmail1">Votre adresse email :</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="...">
                        <small id="emailHelp" class="form-text text-muted">Pour vous envoyer la confirmation de réservation.</small>
                    </div>
                    <div class="form-group">
                        <label class="label_booking" for="example-date-input">Date</label>
                        <input class="form-control" type="date" value="2011-08-19" id="example-date-input">
                    </div>
                    <div class="form-group">
                        <label class="label_booking" for="example-date-input">Créneau</label>
                        <div class="hours">
                            <button type="button" class="btn btn-primary">11h00 à 11h30</button>
                            <button type="button" class="btn btn-primary">11h30 à 12h00</button>
                            <button type="button" class="btn btn-primary">12h00 à 12h30</button>
                            <button type="button" class="btn btn-primary">12h30 à 13h00</button>
                            <button type="button" class="btn btn-primary">13h00 à 13h30</button>
                            <button type="button" class="btn btn-primary">13h30 à 14h00</button>
                            <button type="button" class="btn btn-primary">18h00 à 18h30</button>
                            <button type="button" class="btn btn-primary">18h30 à 19h00</button>
                            <button type="button" class="btn btn-primary">19h00 à 19h30</button>
                            <button type="button" class="btn btn-primary">19h30 à 20h00</button>
                            <button type="button" class="btn btn-primary">20h00 à 20h30</button>
                            <button type="button" class="btn btn-primary">20h30 à 21h00</button>
                        </div>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                        <label class="form-check-label label_booking" for="flexCheckDefault">
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