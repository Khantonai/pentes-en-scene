@extends('layouts.app') 

@section('styles')
    <style>
        #billet {
            display: flex;
            gap: 20px;
        }

        #billet > div {
            padding: 20px;
            border-radius: 10px;
            background-color: var(--white);
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            flex: 1;
            height: 40vw;
            color: var(--grey);
            display: flex;
            flex-direction: column;
            /* align-items: center; */
            align-items: start;
            justify-content: center;
        }

        #billet > div:first-child {
            background: linear-gradient(rgb(0,0,0,0.5), rgb(0,0,0,0.5)), url('https://images.unsplash.com/photo-1512264815082-9999c2d4894d?q=80&w=2223&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D') no-repeat center center / cover;
        }

        #billet > div:last-child {
            background: linear-gradient(rgb(0,0,0,0.5), rgb(0,0,0,0.5)), url('storage/img/image1.png') no-repeat center center / cover;
        }

        #billet h2 {
            font-size: 3rem;
            margin-bottom: 10px;
        }

        #billet p {
            font-size: 1.5rem;
            margin-bottom: 20px;
        }

        #actions {
        width: 100%;
        gap: 20px;
    }

    #actions .flex-col {
        align-items: center;
        flex: 1;
        border-radius: 10px;
        padding-block: 40px;
        color: var(--grey);
    }

    #actions > div:first-child {
        background-color: var(--blue);
    }
    
    #actions > div:first-child a {
        color: var(--blue);
    }
    
    #actions > div:nth-child(2) {
        background-color: var(--purple);
    }
    
    #actions > div:nth-child(2) a {
        color: var(--purple);
    }

    #actions > div:nth-child(3) {
        background-color: var(--red);
    }
    
    #actions > div:nth-child(3) a {
        color: var(--red);
    }

    #actions > div:last-child {
        background-color: var(--black);
    }
    
    #actions > div:last-child a {
        color: var(--black);
    }

    #actions h2 {
        font-size: 1.5rem;
        margin-block: 20px;
    }
    </style>
@endsection

@section('landing-background', 'https://images.unsplash.com/photo-1578575436955-ef29da568c6c?q=80&w=2970&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D')

@section('landing')
    <div class="content">
        <h1>La billetterie</h1>
        <p>Retrouvez ici tous les billets disponibles pour les événements à venir</p>
    </div>
@endsection

@section('content')
   <section id="billet">
    <div>
        <h2>Billet Animations</h2>
        <p>
            Le billet "Animations" vous donne accès à toutes les animations de la journée gratuitement !
        </p>
    </div>
    <div>
        <h2>Billet Animations + Concerts</h2>
        <p>
            Le billet "Animations + Concerts" vous donne accès à toutes les animations de la journée et à la fosse des concerts en plus d'une boisson offerte !        
        </p>
    </div>
   </section>

    <section class="title-section">
        <h2>Billets Animations</h2>
    </section>
    <section id="actions" class="flex-row">
    <div class="flex-col">
        <span class="material-symbols-outlined">looks_one</span>
        <h2>
            Billet 1 jour
        </h2>
        <button>
            <a href="{{ route('tickets.create') }}">
            Choisir ce billet
            </a>
        </button>
    </div>
    <div class="flex-col">
    <span class="material-symbols-outlined">
filter_2
</span>
        <h2>
            Billet 2 jours
        </h2>
        <button>
            <a href="{{ route('tickets.create', ['type' => '2-free']) }}">
            Choisir ce billet
            </a>
        </button>
    </div>
    <div class="flex-col">
    <span class="material-symbols-outlined">
filter_3
</span>
        <h2>
        Billet 3 jours
        </h2>
        <button>
            <a href="{{ route('tickets.create', ['type' => '3-free']) }}">
            Choisir ce billet
            </a>
        </button>
    </div>
    <div class="flex-col">
    <span class="material-symbols-outlined">
filter_4
</span>
    <h2>
        Full Pass
    </h2>
        <button>
            <a href="{{ route('tickets.create', ['type' => '4-free']) }}">
            Choisir ce billet
            </a>
        </button>
    </div>
</section>


<section class="title-section">
        <h2>Billets Animations + Concerts</h2>
    </section>
    <section id="actions" class="flex-row">
    <div class="flex-col">
        <span class="material-symbols-outlined">looks_one</span>
        <h2>
            Billet 1 jour
        </h2>
        <button>
            <a href="{{ route('tickets.create', ['type' => '1-pay']) }}">
            Choisir ce billet
            </a>
        </button>
    </div>
    <div class="flex-col">
    <span class="material-symbols-outlined">
filter_2
</span>
        <h2>
            Billet 2 jours
        </h2>
        <button>
            <a href="{{ route('tickets.create', ['type' => '2-pay']) }}">
            Choisir ce billet
            </a>
        </button>
    </div>
    <div class="flex-col">
    <span class="material-symbols-outlined">
filter_3
</span>
        <h2>
        Billet 3 jours
        </h2>
        <button>
            <a href="{{ route('tickets.create', ['type' => '3-pay']) }}">
            Choisir ce billet
            </a>
        </button>
    </div>
    <div class="flex-col">
    <span class="material-symbols-outlined">
filter_4
</span>
    <h2>
        Full Pass
    </h2>
        <button>
            <a href="{{ route('tickets.create', ['type' => '4-pay']) }}">
            Choisir ce billet
            </a>
        </button>
    </div>
</section>

@endsection