@extends('layouts.app')

@section('styles')
<style>
    @keyframes fadeTop {
        from {
            opacity: 0;
            transform: translateY(-20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
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

    #actions > div:last-child {
        background-color: var(--red);
    }
    
    #actions > div:last-child a {
        color: var(--red);
    }

    #actions h2 {
        font-size: 1.5rem;
        margin-block: 20px;
    }


    #reassurance {
    height: calc(300vh + 800px);
    contain: paint;
    /* padding-top: 300px; */
    }
    #reassurance .timeline-trigger {
    width: 100%;
    height: 80%;
    position: absolute;
    }
    #reassurance .scroll-move {
    margin-inline: 50%;
    width: 100%;
    top: 70%;
    position: sticky;
    }
    #reassurance .scroll-move #timeline {
    /* background-color: blue; */
    background: url('storage/img/holographic.png') repeat center center / 1000px fixed;
    height: 10px;
    z-index: 1;
    border-radius: 3px;
    transform: translateY(-32.5px);
    }
    #reassurance .scroll-move ul {
    margin: 0;
    width: 100%;
    padding: 0;
    z-index: 3;
    display: flex;
    justify-content: space-between;
    list-style: none;
    }
    #reassurance .scroll-move ul .point:first-child {
    transform: translateX(-50%);
    }
    #reassurance .scroll-move ul .point:last-child {
    transform: translateX(50%);
    }
    #reassurance .scroll-move ul .point {
    border: solid 2px var(--blue);
    width: 50px;
    height: 50px;
    border-radius: 5px;
    top: 0;
    left: 0;
    z-index: 3;
    position: relative;
    display: flex;
    justify-content: center;
    align-items: center;
    transition: all 0.3s;
    color: var(--blue);
    }
    #reassurance .scroll-move ul .point.passed {
        background: url('storage/img/holographic.png') repeat center center / 300px fixed;
        border: solid 2px #FFFFFF00;
    }

    #reassurance .scroll-move ul .point div {
        position: absolute;
        top: -220px;
        left: -80px;
        opacity: 0;
        transition: all 0.5s;
        width: 160px;
        height: 160px;
        /* background-color: var(--blue); */
        border: solid 2px var(--blue);
        border-radius: 10px;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        padding: 20px;
        text-align: center;
        gap: 10px;
        /* color: var(--grey); */
        color: var(--blue);
    }

    #reassurance .scroll-move ul .point div h3 {
        font-size: 1.5rem;
        margin: 0;
    }

    #reassurance .scroll-move ul .point div p {
        margin: 0;
    }

    #reassurance .scroll-move ul .point.passed div {
        animation: fadeTop 1s ease;
        opacity: 1;
    }

    #reassurance .scroll-move ul li .material-symbols-outlined {
        font-size: 2.5rem;
    }

    #reassurance .scroll-move ul .point.passed .material-symbols-outlined {
        color: var(--black);
        /* color: white; */
    }

    #reassurance-title {
        position: sticky;
        top: 150px;
        z-index: 2;
    }

    #presentation {
        display: flex;
        flex-direction: column;
        gap: 20px;
    }

    #presentation > div {
        display: flex;
        gap: 20px;
        justify-content: space-between;
    }

    #presentation > div:nth-child(even) {
        display: flex;
        flex-direction: row-reverse;
    }

    #presentation > div img {
        width: 300px;
        height: 300px;
        object-fit: cover;
        border-radius: 10px;
    }

    #presentation > div > div {
        padding: 40px;
        border-radius: 10px;
        border: solid 2px var(--purple);
    }

    #presentation h3 {
        font-size: 1.5rem;
    }

#partenaires {
    border: solid 2px var(--red);
    padding: 20px;
    border-radius: 10px;
}

.slider {
  margin: auto;
  overflow: hidden;
  position: relative;
    width: 100%;
}




.slider .slide-track {
    animation: scroll 35s linear infinite;
    display: flex;
    width: calc(200px * 16 + 1400px); /* double the original width */
    gap: 100px;
}

.slider .slide {
  height: auto;
  width: 200px;
  flex: 0 0 200px;
}

.slider .slide img {
  width: 100%;
  height: 100%;
  object-fit: contain;
}

@keyframes scroll {
    0% { transform: translateX(0); }
    100% { transform: translateX(calc(-200px * 16 + 1400px))}
}

</style>


@endsection

@section('landing-background', 'storage/img/image1.png')

@section('landing')
    <div>
        <h1>
            Pente en Scène
        </h1>
        <p>
            Le festival culturel de l'été à Croix-Rousse
        </p>
        <img src="storage/img/logo-blanc.png" alt="" height="200">
    </div>
@endsection

@section('content')
<section id="actions" class="flex-row">
    <div class="flex-col">
        <span class="material-symbols-outlined">event</span>
        <h2>
            Programme
        </h2>
        <button>
            <a href="{{ route('programme.index') }}">
                Voir le programme
            </a>
        </button>
    </div>
    <div class="flex-col">
    <span class="material-symbols-outlined">
theater_comedy
</span>
        <h2>
            Animations
        </h2>
        <button>
            <a href="{{ route('animations.index') }}">
                Voir les animations
            </a>
        </button>
    </div>
    <div class="flex-col">
    <span class="material-symbols-outlined">
local_activity
</span>
        <h2>
            Billeterie
        </h2>
        <button>
            <a href="">
                Acheter un billet
            </a>
        </button>
</section>

<section class="title-section">
    <h2>À propos de Pente en Scène</h2>
</section>

<section id="presentation">
    <div>
        <div>
            <h3>Le festival culturel de l'été à Croix-Rousse</h3>
            <p>
                Pente en Scène est un festival culturel qui se déroule chaque été à Croix-Rousse. Il propose une programmation riche et variée, alliant concerts, spectacles de rue, animations pour enfants, expositions, ateliers, conférences et bien d'autres activités. Le festival est ouvert à tous et se veut un lieu de rencontre et d'échange entre les habitants du quartier et les visiteurs de passage. Venez découvrir la richesse et la diversité de la culture lyonnaise dans une ambiance conviviale et festive !
            </p>
        </div>
        <img src="storage/img/image2.jpg" alt="">
    </div>
    <div>
        <div>
            <h3>Un événement incontournable de l'été à Lyon</h3>
            <p>
                Depuis sa création en 2005, Pente en Scène est devenu un événement incontournable de l'été à Lyon. Chaque année, des milliers de spectateurs se pressent dans les rues de Croix-Rousse pour assister aux concerts, aux spectacles de rue, aux animations et aux expositions proposés par le festival. Les artistes locaux et internationaux se succèdent sur les différentes scènes du festival pour offrir au public des moments inoubliables et des découvertes musicales et artistiques uniques. Venez vivre l'expérience Pente en Scène et laissez-vous emporter par la magie du festival !
            </p>
        </div>
        <img src="https://www.tourmag.com/photo/art/grande/66000069-46986944.jpg?v=1657621760" alt="">
    </div>
    <div>
        <div>
            <h3>Un festival engagé pour la culture et l'environnement</h3>
            <p>
                Pente en Scène est un festival engagé pour la culture et l'environnement. Depuis sa création, il s'efforce de promouvoir la diversité culturelle et artistique, de soutenir les artistes émergents et de sensibiliser le public aux enjeux environnementaux. Le festival propose des animations et des activités éco-responsables, comme des ateliers de sensibilisation à l'environnement, des expositions sur le thème de l'écologie, des conférences sur le
                développement durable et des spectacles de rue engagés. Venez participer à un événement festif et engagé, qui allie culture, art et environnement dans une ambiance conviviale et festive !
            </p>
        </div>
        <img src="storage/img/image3.jpg" alt="">
    </div>
</section>


<section id="reassurance">
    <div id="reassurance-title" class="title-section">
        <h2>Pourquoi Pente en Scène</h2>
    </div>
            <div class="timeline-trigger"></div>
            <div class="scroll-move">
                <ul>
                    <li class="point">
                        <span class="material-symbols-outlined">money_off</span>
                        <div>
                            <h3>Animations gratuites</h3>
                            <p>Accédez à de nombreuses activités culturelles gratuitement sur place ! (hors concerts)</p>
                        </div>
                    </li>
                    <li class="point">
                        <span class="material-symbols-outlined">redeem</span>
                        <div>
                            <h3>Pass Culture Friendly</h3>
                            <p>Ne soyez pas limité par le prix ! Le billet est éligible au Pass Culture</p>
                        </div>
                    </li>
                    <li class="point">
                        <span class="material-symbols-outlined">speaker_group</span>
                        <div>
                            <h3>Concerts RnB</h3>
                            <p>Plongez dans le style RnB, ce type de musique qui a marqué pour toujours l'histoire de la musique</p>
                        </div>
                    </li>              
                    <li class="point">
                        <span class="material-symbols-outlined">verified_user</span>
                        <div>
                            <h3>Sécurité renforcée</h3>
                            <p>Un contrôle est effectué à l'entrée du festival</p>
                        </div>
                    </li>              
                </ul>
                <div id="timeline"></div>
            </div>
        </section>

        <section class="title-section">
            <h2>Nos partenaires</h2>
        </section>

        <section id="partenaires">
            <div class="slider">
                <div class="slide-track">
                    <div class="slide">
                        <img src="https://upload.wikimedia.org/wikipedia/fr/thumb/b/b8/Logo_M%C3%A9tropole_Lyon_-_2022.svg/2560px-Logo_M%C3%A9tropole_Lyon_-_2022.svg.png" alt="" />
                    </div>
                    <div class="slide">
                        <img src="https://pro.lyon-france.com/var/site/storage/images/_aliases/large/4/8/0/5/745084-1-fre-FR/51c1a98ab6b3-ONLYLYON_RVB_OT_POSITIF.png" alt="" />
                    </div>
                    <div class="slide">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/4/49/LogoCNSMDL.svg" alt="" />
                    </div>
                    <div class="slide">
                        <img src="https://upload.wikimedia.org/wikipedia/fr/thumb/4/4b/Tcl-sytral-mobilites.svg/1024px-Tcl-sytral-mobilites.svg.png?20220505082255" alt="" />
                    </div>
                    <div class="slide">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/3/3a/France3_ara.png/1200px-France3_ara.png" alt="" />
                    </div>
                    <div class="slide">
                        <img src="https://www.itis-commerce.com/wp-content/uploads/2020/04/chocolats-voisin-logo.png" alt="" />
                    </div>
                </div>
            </div>
        </section>

        <script>
            console.log($);
            $(document).ready(function() {
    var $slides = $('.slider .slide-track').children().clone();
    $('.slider .slide-track').append($slides);
});
        </script>


@endsection