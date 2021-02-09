@extends('layouts.default')

@section('content')

<div class="hero-image">
  <div class="hero-text">
    <h1>CLICK & COLLECT</h1>
    <p>Venez chercher un repas tout prêt dans votre restaurant ! </p>
    <a>J'AI FAIM</a>
  </div>
</div>
<div class="container">
  <div id="concept">
    <div class="card" style="width: 100%;">
      <div class="card-body">
        <h2>Le concept</h2>
        <h5 class="card-title">COMMENT ÇA MARCHE ? </h5>
        <p class="card-text">Nous vous proposons de venir chercher un repas équilibré dans notre restaurant. Nous cuisinons tous les midi et tous les soirs environ 40 repas (du lundi au vendredi). Pour cela, il suffit de choisir un créneau et venir directement chercher au restaurant le repas. le restaurant vous accueille dans le respect du protocole sanitaire. </p>
        <!-- <a href="" class="btn_book">Go somewhere</a> -->
      </div>
    </div>
  </div>

  <div id="hours">

    <div class="card" style="width: 100%;">
      <div class="card-body row justify-content-center align-items-center">
        <h2>Horaires</h2>
        <h5 class="card-title" style="margin-bottom: 20px;">À QUELLE HEURE ?
        </h5>
        <div class="hours">
          <div><span>Lundi</span> <br />10h00 à 14h00 <br />18h00 à 22h00</div>
          <div><span>Mardi</span> <br />10h00 à 14h00 <br />18h00 à 22h00</div>
          <div><span>Mercredi</span> <br />10h00 à 14h00 <br />18h00 à 22h00</div>
          <div><span>Jeudi</span> <br />10h00 à 14h00 <br />18h00 à 22h00</div>
          <div><span>Vendredi</span> <br />10h00 à 14h00 <br />18h00 à 22h00</div>
        </div>
        <p class="close">Nous ne proposons pas de repas à emporter le week-end (samedi et dimanche).</p>
      </div>
    </div>
  </div>




  <div id="info">


    <div class="card" style="width: 100%;">

      <div class="card-body row justify-content-center">
        <h2>Informations pratiques</h2>
        <h5 class="card-title">COMMENT NOUS JOINDRE ?
        </h5>
        <div class="col-md-6" ><svg style="margin-right:10px" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-telephone-fill" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z" />
          </svg> 02 93 04 28 57</div>
        <div class="col-md-6 " ><svg style="margin-right:10px" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope-fill" viewBox="0 0 16 16">
            <path d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555zM0 4.697v7.104l5.803-3.558L0 4.697zM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586l-1.239-.757zm3.436-.586L16 11.801V4.697l-5.803 3.546z" />
          </svg>hello@foodbooking.com</div>
        <h5 class="card-title" style="padding:30px 0">OÙ NOUS TROUVER ?
          <div class="map-responsive">
            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d10499.388539404134!2d2.3562227!3d48.8611253!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x165cc8f5142afd8c!2sLe%20Reflet!5e0!3m2!1sfr!2sfr!4v1612877216580!5m2!1sfr!2sfr" width="500" height="350" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
          </div>
          <h5 class="card-title">COMMENT VENIR ?</h5>
          <p><strong>Métro :</strong> Halles (4/RER A, B et D), Rambuteau (11), Hôtel de Ville (1/11)</p>
      </div>
    </div>
  </div>
</div>


@endsection