@extends('layouts.app')

@section('content')

<h1 style="color: blue">{{$pagament->titol}}</h2>

<p>{!!$pagament->descripcio!!}</p>

<hr/>

<p>Preu: {!! $pagament->preu!!} €</p>

<form action="https://sis.sermepa.es/sis/realizarPago" method="post" accept-charset="utf-8"
    id="form_260">
        <input type="hidden" name="Ds_SignatureVersion" value="HMAC_SHA256_V1" />
        <input type="hidden" name="Ds_MerchantParameters" value="eyJEU19NRVJDSEFOVF9BTU9VTlQiOiIyMDAwMCIsIkRTX01FUkNIQU5UX09SREVSIjoiMjAwMjI3MTAyOTU0IiwiRFNfTUVSQ0hBTlRfTUVSQ0hBTlRDT0RFIjoiMDIyMzE2Nzk5MCIsIkRTX01FUkNIQU5UX0NVUlJFTkNZIjoiOTc4IiwiRFNfTUVSQ0hBTlRfVFJBTlNBQ1RJT05UWVBFIjoiMCIsIkRTX01FUkNIQU5UX1RFUk1JTkFMIjoiMSIs">
        <input class="btn btn-primary" type="submit" value="Fer el pagament">
</form>

<hr />

<div>
<a class="btn btn-twitter text-light" href="https://twitter.com/home?status=https://pagaments.inscamidemar.cat/pagament/ESO/274">Twitter</a>

          <a class="btn btn-facebook text-light" href="http://facebook.com/sharer.php?u=https://pagaments.inscamidemar.cat/pagament/ESO/274">Facebook</a>

          <a class="btn btn-whatsapp text-light" href="https://api.whatsapp.com/send?text=Mira los pagos activos de https://pagaments.inscamidemar.cat/pagament/ESO/274">WhatsApp</a>

          <a class="btn btn-telegram text-light" href="tg:msg_url?url=https://pagaments.inscamidemar.cat/pagament/ESO/274&text=Pagaments de l'Ins Camí de Mar">Telegram</a>
</div>

@endsection