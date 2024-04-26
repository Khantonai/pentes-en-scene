@extends('layouts.user')
@section('content')
<div class="container;">
    <h1 style="margin: 10px;">Merci pour votre achat !</h1>
    <p style="font-size: 1.2em;">Votre billet a été acheté avec succès. Voici les détails de votre achat :</p>

    <ul style="list-style-type: none; padding-left: 0; background-color: var(--blue); padding: 20px; border-radius: 10px; color: white;">
        <li style="padding: 10px 0; border-bottom: 1px solid #ccc;">Nom : <strong>{{ $ticket->first_name }} {{$ticket->last_name}}</strong></li>
        <li style="padding: 10px 0; border-bottom: 1px solid #ccc;">Date de début : <strong>{{ $ticket->date_start }}</strong></li>
        <li style="padding: 10px 0; border-bottom: 1px solid #ccc;">Date de fin : <strong>{{ $ticket->date_end }}</strong></li>
        <li style="padding: 10px 0; border-bottom: 1px solid #ccc;">Prix : <strong>{{ $ticket->price }}</strong></li>
    </ul>

    <p style="font-size: 1.2em;">Nous avons envoyé un email de confirmation à <strong>{{ $ticket->email }}</strong>. Veuillez vérifier votre boîte de réception.</p>
</div>
@auth
    <div class="container">
       <button class="tablinks" style="border: solid 2px var(--purple);"><a href="{{ route('dashboard') }}" style="color:black;">Voir mes billets</a></button>
    </div>
@endauth
@guest
    <div class="container" style="border: solid 2px var(--black);">
    <button class="tablinks" style="border: solid 2px var(--purple);"><a href="{{route('welcome')}}" style="border: solid 2px var(--black);">Accueil</a></button>
    </div>
@endguest
@endsection