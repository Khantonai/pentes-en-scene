
<div class="container">
    <h1 style="color: green; text-align: center;">Merci pour votre achat !</h1>
    <p style="font-size: 1.2em;">Votre billet a été acheté avec succès. Voici les détails de votre achat :</p>

    <ul style="list-style-type: none; padding-left: 0;">
        <li style="padding: 10px 0; border-bottom: 1px solid #ccc;">Nom : <strong>{{ $ticket->first_name }} {{$ticket->last_name}}</strong></li>
        <li style="padding: 10px 0; border-bottom: 1px solid #ccc;">Date de début : <strong>{{ $ticket->date_start }}</strong></li>
        <li style="padding: 10px 0; border-bottom: 1px solid #ccc;">Date de fin : <strong>{{ $ticket->date_end }}</strong></li>
        <li style="padding: 10px 0; border-bottom: 1px solid #ccc;">Prix : <strong>{{ $ticket->price }}</strong></li>
    </ul>

    <p style="font-size: 1.2em;">Nous avons envoyé un email de confirmation à <strong>{{ $ticket->email }}</strong>. Veuillez vérifier votre boîte de réception.</p>
</div>
@auth
    <div class="container">
        <a href="{{ route('dashboard') }}" class="btn btn-primary">Voir mes billets</a>
    </div>
@endauth
@guest
    <div class="container">
        <a href="{{route('welcome')}}" class="btn btn-primary">Accueil</a>
    </div>
@endguest