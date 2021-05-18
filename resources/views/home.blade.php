@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <!-- <div class="card">
                <div class="card-header"></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h2>Plataforma de Pagaments</h2>
                </div>
            </div> -->

            <h2>Pagaments INS Camí de Mar</h2>
            <br>
            <p>Aquesta és la pàgina principal dels pagaments online de l'INS Camí de Mar de Calafell, per a procedir a realitzar un pagament, escull el curs al menú de la barra blava superior i fes clic al nom del pagament que vulguis realitzar per a continuar amb el tràmit.</p>

            <br>

            <a class="btn btn-twitter text-light" href="https://twitter.com/home?status=https://pagaments.inscamidemar.cat/pagament/ESO/274">Twitter</a>

            <a class="btn btn-facebook text-light" href="http://facebook.com/sharer.php?u=https://pagaments.inscamidemar.cat/pagament/ESO/274">Facebook</a>

            <a class="btn btn-whatsapp text-light" href="https://api.whatsapp.com/send?text=Miralospagosactivosdehttps://pagaments.inscamidemar.cat/pagament/ESO/274">WhatsApp</a>

            <a class="btn btn-telegram text-light" href="tg:msg_url?url=https://pagaments.inscamidemar.cat/pagament/ESO/274&text=Pagamentsdel'InsCamídeMar">Telegram</a>
        </div>
    </div>
</div>
@endsection