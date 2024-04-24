
@if ($errors->has('referral_link'))
    <span class="error">{{ $errors->first('referral_link') }}</span>
@endif

<form action="{{ route('tickets.store') }}" method="POST">
    @csrf
    <label for="first_name">Prénom:</label><br>
    <input type="text" id="first_name" name="first_name" value="{{ old('first_name', auth()->user()->first_name ?? '') }}"><br>
    <label for="last_name">Nom:</label><br>
    <input type="text" id="last_name" name="last_name" value="{{ old('last_name', auth()->user()->last_name ?? '') }}"><br>
    <label for="email">Email:</label><br>
    <input type="email" id="email" name="email" value="{{ old('email', auth()->user()->email ?? '') }}"><br>
    <label for="type">type</label>
        <select id="type" name="type">
            <option value="Gratuit"> Gratuit</option>
            <option value="Premium"> Premium</option>
        </select>
    <label for="date_start">Date de début:</label><br>
    <input type="date" id="date_start" name="date_start" min="2025-01-01" max="2025-12-31"><br>
    <label for="date_end">Date de fin:</label><br>
    <input type="date" id="date_end" name="date_end"min="2025-01-01" max="2025-12-31"><br>
    <label for="phone">Téléphone:</label><br>
    <input type="tel" id="phone" name="phone" pattern="^((\+\d{1,3}(-| )?\(?\d\)?(-| )?\d{1,5})|(\(?\d{2,6}\)?))(-| )?(\d{3,4})(-| )?(\d{4})(( x| ext)\d{1,5}){0,1}$" value="{{ old('phone', auth()->user()->phone ?? '') }}"><br>
    <label for="referral_link">Affiliation : </label>
    <input type="text" id="referral_link" name="referral_link">
    <input type="submit" value="Acheter">
</form>

<ul>
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    @endif
</ul>


<script>
    // Récupérer le paramètre referral_link de l'URL
    const urlParams = new URLSearchParams(window.location.search);
    const referralLink = urlParams.get('referral_link');

    // Si referral_link existe, définir comme valeur du champ
    if (referralLink) {
        document.getElementById('referral_link').value = referralLink;
    }
</script>