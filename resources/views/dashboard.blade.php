<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>

    
<!-- Afficher le lien de parrainage -->
<div id="link">{{ url('/register?referral_link=' . auth()->user()->referral->link) }}</div>

<!-- Bouton pour copier le lien de parrainage -->
<button onclick="copyReferralLink()">Copier le lien de parrainage</button>

<!-- Script JavaScript pour copier le lien de parrainage -->
<script>
function copyReferralLink() {
    // Créer un nouvel élément textarea
    var textarea = document.createElement('textarea');

    // Définir le contenu du textarea sur le lien de parrainage
    textarea.textContent = document.getElementById('referralLink').textContent;

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
</script>
<!-- Afficher le lien de parrainage -->

</x-app-layout>
