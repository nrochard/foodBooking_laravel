@extends('layouts.default')

@section('content')




<!-- @if (session('status'))
    <div class="text-white px-6 py-4 border-0 rounded relative mb-4 bg-green-500 mt-4">
        {{ session('status') }}
    </div>
@endif -->

<div id="formContact">
    <div class="container">

        @if ($errors->any())
        <div class="alert alert-danger" role="alert">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
            </span>
        </div>
        @endif


        <h1>Une question ? </h1>
        <h2>Envoyez nous un message et nous vous répondrons rapidement.</h2>

        <div class="card" style="width: 100%;" id="contact">
            <div class="card-body row justify-content-center align-items-center">
                <form action="/contact" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="first_name">Ton prénom : </label>
                                <input type="text" class="form-control" name="first_name" id="first_name" autocomplete="given-name" value="{{ old('first_name') }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="last_name">Ton nom :</label>
                                <input type="text" class="form-control" name="last_name" id="last_name" autocomplete="family-name" value="{{ old('last_name') }}">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email_address">Ton adresse mail :</label>
                        <input type="email" class="form-control" name="email" id="email_address" autocomplete="email" value="{{ old('email') }}">
                    </div>

                    <div class="form-group">
                        <label for="street_address">Ton message : </label>
                        <textarea class="form-control" id="street_address" name="message" rows="3">{{ old('message') }}</textarea>
                    </div>
                    <button type="submit" class="btn btn-book">Envoyer</button>
                </form>
            </div>
        </div>
    </div>
</div>


</div>


@endsection