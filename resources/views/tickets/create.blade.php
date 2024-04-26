@extends('layouts.user')

@section('content')
@if ($errors->has('referral_link'))
    <span class="error">{{ $errors->first('referral_link') }}</span>
@endif
<div class="ll">

<h1>Acheter un billet</h1>
<form action="{{ route('tickets.store') }}" method="POST" class="jj">
    @csrf
    <div class="aa">
        <div>
            <label for="first_name">Prénom:</label>
            <input type="text" id="first_name" name="first_name" value="{{ old('first_name', auth()->user()->first_name ?? '') }}">
        </div>
        <div>
            <label for="last_name">Nom:</label>
            <input type="text" id="last_name" name="last_name" value="{{ old('last_name', auth()->user()->last_name ?? '') }}">
        </div>
    </div>
    <div class="aa">
        <div>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="{{ old('email', auth()->user()->email ?? '') }}">
        </div>
        <div>
            <label for="type">Type</label>
                <select id="type" name="type">
                    <option value="Gratuit"> Gratuit</option>
                    <option value="Premium"> Premium</option>
                </select>
        </div>
    </div>
    <div class="aa">
        <div>
            <label for="date_start">Date de début:</label>
            <input type="date" id="date_start" name="date_start" min="2025-07-03" max="2025-07-06">
        </div>
        <div>
            <label for="date_end">Date de fin:</label>
            <input type="date" id="date_end" name="date_end"min="2025-07-03" max="2025-07-06">
        </div>
    </div>
    <div class="bb">
        <label for="phone">Téléphone:</label>
        <input type="tel" id="phone" name="phone" pattern="^((\+\d{1,3}(-| )?\(?\d\)?(-| )?\d{1,5})|(\(?\d{2,6}\)?))(-| )?(\d{3,4})(-| )?(\d{4})(( x| ext)\d{1,5}){0,1}$" value="{{ old('phone', auth()->user()->phone ?? '') }}">
    </div>
    <div class="bb">
        @auth
            <label for="referral_link">Affiliation : </label>
            <input type="text" id="referral_link" name="referral_link">
        @endauth
    </div>
    <p id="price">Prix : 0 €</p>
    <input type="submit" value="Acheter">
    @guest
        <a href="{{ route('login.redirect', ['from' => route('tickets.create')]) }}">Se connecter</a>
    @endguest
</form>
<ul>
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    @endif
</ul>
</div>

<script>
    // Récupérer le paramètre referral_link de l'URL
    const urlParams = new URLSearchParams(window.location.search);
    const referralLink = urlParams.get('referral_link');
    const type = urlParams.get('type');

    // Si referral_link existe, définir comme valeur du champ
    try {
        document.getElementById('referral_link').value = referralLink;
    } catch (error) {  
    }

    document.addEventListener('DOMContentLoaded', function() {
    // Sélectionner les éléments de formulaire
    var typeElement = document.getElementById('type');
    var dateStartElement = document.getElementById('date_start');
    var dateEndElement = document.getElementById('date_end');
    var priceElement = document.getElementById('price');

    // Créer une fonction pour gérer les changements
    function handleChange() {
        // Obtenir les valeurs des éléments de formulaire
        var type = typeElement.value;
        var dateStart = new Date(dateStartElement.value);
        var dateEnd = new Date(dateEndElement.value);

        // Calculer le nombre de jours
        var days = (dateEnd - dateStart) / (1000 * 60 * 60 * 24);
        var promo = null;  
        if (referralLink!=null) {
            console.log("AAHAAh" + referralLink);
            promo = 0.15;
            console.log(promo);
        }

        // Définir le prix en fonction du type de billet et du nombre de jours
        var price;
        if (isNaN(days)) {
            days = 0; // ou une autre valeur par défaut
        }
        if (type == 'Premium') {
            if (days == 0) {
                price = 0;
                console.log(price);
            }else if (days <=3) {
                price = 50-(50*promo);
                console.log(promo);
            }
            else if (days <= 7) {
                price = 70-(70 * promo);
                console.log(price);
            }
            else {
                price = 80-(80*promo);
            }
        }
        else {
            price = 0; // Gratuit
        }

        // Afficher le prix
        priceElement.textContent = 'Prix : ' + price + ' €';
    }

    // Écouter les événements de changement sur les éléments de formulaire
    typeElement.addEventListener('change', handleChange);
    dateStartElement.addEventListener('change', handleChange);
    dateEndElement.addEventListener('change', handleChange);


    if (type == '2-free') {
    document.getElementById('date_start').value = '2025-07-03';
    document.getElementById('date_end').value = '2025-07-04';
}
else if (type == '3-free') {
    document.getElementById('date_start').value = '2025-07-03';
    document.getElementById('date_end').value = '2025-07-05';
}
else if (type == '3-free') {
    document.getElementById('date_start').value = '2025-07-03';
    document.getElementById('date_end').value = '2025-07-06';
}
else if (type == '1-pay') {
    document.getElementById('type').value = 'Premium';
}
else if (type == '2-pay') {
    document.getElementById('type').value = 'Premium';
    document.getElementById('date_start').value = '2025-07-03';
    document.getElementById('date_end').value = '2025-07-04';
}
else if (type == '3-pay') {
    document.getElementById('type').value = 'Premium';
    document.getElementById('date_start').value = '2025-07-03';
    document.getElementById('date_end').value = '2025-07-05';
}
else if (type == '4-pay') {
    document.getElementById('type').value = 'Premium';
    document.getElementById('date_start').value = '2025-07-03';
    document.getElementById('date_end').value = '2025-07-06';
}

handleChange();
});





</script>

<style>
    form.jj {
        display: flex;
        flex-direction: column;
        align-items: center;
        width: 400px !important;
        background-color: var(--blue);
        padding: 30px;
        border-radius: 10px;
        color: white;
    }
    input, select {
        display:flex;
        width: 100%;
        padding: 5px;
        justify-content: center;

    }
    label{
        display:flex;
        justify-content: center;
    }
    .ticket {
        margin: 10px 0;
        padding: 10px;
        border: 1px solid #ccc;
        width: 300px;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
    }

    .aa {
        display: flex;
        flex-direction: row;
        gap : 20px;
        width: 100%;
    }

    .aa > div {
        flex: 1;
    }

    .bb {
        display: flex;
        flex-direction: column;
        gap : 0px;
        width: 100%;
    }
    .ll {
        display: flex;
        gap: 200px;
        padding-inline: 100px;
    }
</style>

@endsection