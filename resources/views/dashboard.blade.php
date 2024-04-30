@extends('layouts.user')

@section('styles')
<style>
    .tab {
  overflow: hidden;
  padding: 20px;
  background-color: var(--purple);
  border-radius: 10px;
  display: flex;
  gap: 20px;
}

.tab button {
    flex: 1;
    font-size: 1.5rem;
}

/* Style the tab content */
.tabcontent {
    display: none;
    border-top: none;
    animation: fadeEffect 1s; 
    border-radius: 10px;
}

.tabcontent:not(#coordonnees) {
    padding: 20px;
    background-color: var(--blue);
    color: white;
}




/* Go from zero to full opacity */
@keyframes fadeEffect {
  from {opacity: 0;}
  to {opacity: 1;}
}

.ticket {
    border-radius: 10px;
    background: url('storage/img/holographic.png') no-repeat center center / 120vw fixed;
    padding: 20px;
    margin-bottom: 20px;
}

.tabcontent form:not(#send-verification) {
    border-radius: 10px;
    padding: 20px;
    width: 300px;
}

.tabcontent form:not(#send-verification) > div {
    /* display: flex;
    flex-direction: column;
    gap: 10px; */
    width: 100%;
}

.tabcontent form:not(#send-verification) > div {
    display: flex;
    flex-direction: column;
    gap: 10px;
}

.tabcontent form.p-6 {
    width: 100% !important;
}

.tabcontent form.p-6 > div {
    width: 300px !important;
}

</style>

@endsection

@section('content')
    <h1>Bienvenue {{ Auth::user()->first_name }}, sur votre espace compte</h1>
    <!-- Tab links -->
        <div class="tab">
        <button class="tablinks <?php echo session('status') != null ? '' : 'active'; ?>" onclick="openCity(event, 'tickets')">Mon billet</button>
        <button class="tablinks" onclick="openCity(event, 'parrainage')">Parrainage</button>
        <button class="tablinks <?php echo session('status') != null ? 'active' : ''; ?>" onclick="openCity(event, 'coordonnees')">Coordonnées</button>
        </div>

        <!-- Tab content -->
        <div id="tickets" class="tabcontent" <?php echo session('status') != null ? '' : 'style="display:block;"'; ?>>
            <h2>Mon billet</h2>
            @if($tickets->count() > 0)
                @foreach ($tickets as $ticket)
                        <div class="ticket">
                            <h3>{{ $ticket->first_name }} {{ $ticket->last_name }}</h3>
                            <p>Date : {{ \Carbon\Carbon::parse($ticket->date_start)->format('d/m/y') }}</p>
                            <a href="{{ route('tickets.pdf', $ticket->token) }}" class="button">Voir le PDF</a>
                        </div>
                @endforeach
            @else
                <p>Vous n'avez pas encore de billet.</p>
                <a href="{{ route('billetterie') }}" class="button">Voir la billetterie</a>
            @endif
        </div>

        <div id="parrainage" class="tabcontent">
            <h2>Mon lien de parrainage</h2>
            @if($tickets->count() > 0)
                <div id="link">{{ url('/billetterie/acheter?referral_link=' . auth()->user()->referral->link) }}</div>
                <button onclick="copyReferralLink()">Copier le lien de parrainage</button>
            @else
                <p>Achetez un billet pour obtenir un lien de parrainage.</p>
                <a href="{{ route('billetterie') }}" class="button">Voir la billetterie</a>
            @endif
            <!-- Bouton pour copier le lien de parrainage -->
        </div>

        <div id="coordonnees" class="tabcontent" <?php echo session('status') != null ? 'style="display:block;"' : ''; ?>>
        <h2>Coordonnées</h2>
            @include('profile.edit', ['user' => Auth::user()])
        </div>

    <!-- ======================================== -->

    




<!-- Script JavaScript pour copier le lien de parrainage -->
<script>
    function copyReferralLink() {
        // Créer un nouvel élément textarea
        var textarea = document.createElement('textarea');

        // Définir le contenu du textarea sur le lien de parrainage
        textarea.textContent = document.getElementById('link').textContent;

        // Ajouter le textarea au document
        document.body.appendChild(textarea);

        // Sélectionner le contenu du textarea
        textarea.select();

        // Copier le contenu du textarea
        document.execCommand('copy');

        // Supprimer le textarea du document
        document.body.removeChild(textarea);

        // Afficher un message indiquant que le lien de parrainage a été copié
        alert('Lien de parrainage copié !');
    }

    function openCity(evt, cityName) {
        // Declare all variables
        var i, tabcontent, tablinks;

        // Get all elements with class="tabcontent" and hide them
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }

        // Get all elements with class="tablinks" and remove the class "active"
        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }

        // Show the current tab, and add an "active" class to the button that opened the tab
        document.getElementById(cityName).style.display = "block";
        evt.currentTarget.className += " active";
        
    }

    // document.addEventListener('mousemove', function(e) {
    //     const x = (e.pageX / window.innerWidth) * 100;
    //     const y = (e.pageY / window.innerHeight) * 100;

    //     document.querySelector(".ticket").style.backgroundPosition = `${x}% ${y}%`;
    // });
</script>
<!-- Afficher le lien de parrainage -->

@endsection
