@extends('layouts.reservations.app')
@section('contente')
    <section class="">
        <div id="myCarousel" class="carousel slide banner" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#myCarousel" data-slide-to="1"></li>
                <li data-target="#myCarousel" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="first-slide" src="images/banner1.jpg" alt="First slide">
                    <div class="carousel-caption ">
                        <div>
                            <div class="typing">
                                <h2 class="text-uppercase">Bienvenue à notre hôtel de charme...</h2>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="second-slide" src="images/banner2.jpg" alt="Second slide">
                    <div class="carousel-caption ">
                        <div>
                            <div class="typing">
                                <h2 class="text-uppercase">Bienvenue à notre hôtel de charme...</h2>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="third-slide" src="images/banner3.jpg" alt="Third slide">
                    <div class="carousel-caption">
                        <div>
                            <div class="typing">
                                <h2 class="text-uppercase">Bienvenue à notre hôtel de charme...</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <style>
                .carousel-caption {
                    position: absolute;
                    top: 50%;
                    left: 50%;
                    transform: translate(-50%, -50%);
                    text-align: center;
                    padding: 10px;
                    color: white;
                }

                /* Importing fonts from Google */
                @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap');

                .typing::before {
                    content: '';
                    position: absolute;
                    top: 0;
                    right: 0;
                    width: 2px;
                    height: 100%;
                    animation: cursorBlink 0.8s steps(3) infinite;
                }

                @keyframes cursorBlink {

                    0%,
                    75% {
                        opacity: 1;
                    }

                    76%,
                    100% {
                        opacity: 0;
                    }
                }

                .typing {
                    position: relative;
                    -webkit-box-reflect: below 1px linear-gradient(transparent, #3333);
                }

                .typing h2 {
                    position: relative;
                    color: white;
                    letter-spacing: 3px;
                    overflow: hidden;
                    margin-bottom: 0;
                    animation: type 4s steps(30) infinite;
                }

                @keyframes type {

                    0%,
                    100% {
                        width: 0px;
                    }

                    30%,
                    60% {
                        width: 394.09px;
                    }
                }

                @media(max-width: 330px) {
                    .typing h2 {
                        font-size: 3rem;
                        animation: type 5s steps(10) infinite;
                    }

                    @keyframes type {

                        0%,
                        100% {
                            width: 0px;
                        }

                        30%,
                        60% {
                            width: 305px;
                        }
                    }
                }
            </style>
            <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>

        </div>

        <div class="container">
            @if (session('success'))
                <script type="text/javascript">
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 6000,
                        timerProgressBar: true,
                        didOpen: (toast) => {
                            toast.addEventListener('mouseenter', Swal.stopTimer)
                            toast.addEventListener('mouseleave', Swal.resumeTimer)
                        }
                    })

                    Toast.fire({
                        icon: 'success',
                        title: 'Demande de réservation fait avec succès'
                    })
                </script>
            @endif
            <div class="container mt-5">
                <div class="book_room">
                    <h1>Réservez une Chambre en Ligne</h1>
                    <form class="book_now" method="POST" action="{{ route('reservationclient') }}">
                        @csrf
                        @method('GET')
                        <div class="row text-white">
                            <div class="col-md-6">

                                <label for="nom_client">Nom & Prenom</label>
                                <input class="online_book" type="text" name="nom_client" value="{{ old('nom_client') }}">
                                @error('nom_client')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror

                                <label for="email_client">Entre votre email</label>
                                <input class="online_book" type="email" name="email_client"
                                    value="{{ old('email_client') }}">
                                @error('email_client')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror

                                <label for="tel_client">Entre votre Numero de telephone</label>
                                <input class="online_book" type="tel" name="tel_client" value="{{ old('tel_client') }}">
                                @error('tel_client')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror

                                <label for="date_arrive">Arrivée</label>
                                <input class="online_book" type="date" name="date_arrive"
                                    value="{{ old('date_arrive') }}">
                                @error('date_arrive')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror

                            </div>
                            <div class="col-md-6">
                                <label for="date_depart">Départ</label>
                                <input class="online_book" type="date" name="date_depart"
                                    value="{{ old('date_depart') }}">
                                @error('date_depart')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror

                                <label for="type_chambre">Type de Chambre</label>
                                <select class="online_book text-white bg-dark" name="type_chambre">
                                    <option value="">Selection un type de chambre</option>
                                    <option value="standard" {{ old('type_chambre') === 'standard' ? 'selected' : '' }}>
                                        Standard</option>
                                    <option value="privilege" {{ old('type_chambre') === 'privilege' ? 'selected' : '' }}>
                                        Privilège
                                    </option>
                                    <option value="suite junior"
                                        {{ old('type_chambre') === 'suite junior' ? 'selected' : '' }}>Suite Junior
                                    </option>
                                    <option value="suite VIP" {{ old('type_chambre') === 'suite VIP' ? 'selected' : '' }}>
                                        Suite VIP
                                    </option>
                                </select>
                                @error('type_chambre')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror

                                <label for="nombre_adulte">Nombre d'Adultes</label>
                                <input class="online_book" type="number" name="nombre_adulte" min="1"
                                    max="2" value="{{ old('nombre_adulte', 1) }}">
                                @error('nombre_adulte')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror

                                <label for="nombre_adulte">Nombre d'Enfants</label>
                                <input class="online_book" type="number" name="nombre_enfant" min="0"
                                    max="5" value="{{ old('nombre_enfant', 0) }}">
                                @error('nombre_enfant')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <button type="submit" class="book_btn">Réserver Maintenant</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        </div>

    </section>
@endsection
