<header id="header">
<nav>
    <a href="/"><img src="../storage/img/logo.png" alt=""></a>
    <ul>
        <li><a href="/about" class="button">Programme</a></li>
        <li><a href="/about" class="button">Présentation</a></li>
        <li><a href="/contact" class="button">Contact</a></li>
        <li><a href="/billetterie" class="button">Billetterie</a></li>
    </ul>
    @if (Auth::check())
        <ul>
            <li><a href="/dashboard" class="button">Mon compte</a></li>
            <li style="cursor: pointer;">
            <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <a class="button" :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Se déconnecter') }}
                            </a>
                        </form>
            </li>
        </ul>
    @else
        <ul>
            <li><a href="/login" class="button">Se connecter</a></li>
            <li><a href="/register" class="button">Créer un compte</a></li>
        </ul>
    @endif
</nav>
</header>