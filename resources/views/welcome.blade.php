<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>E-carnet</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="../css/maicons.css">

    <link rel="stylesheet" href="../css/bootstrap.css">


    <link rel="stylesheet" href="../vendor/owl-carousel/css/owl.carousel.css">

    <link rel="stylesheet" href="../vendor/animate/animate.css">

    <link rel="stylesheet" href="../css/theme.css">
</head>

<body>
    <header>
        <div class="topbar">
            <div class="container">
                <div class="row">
                    <div class="col-sm-8 text-sm">
                        <div class="site-info">
                            <a href="#"><span class="mai-call text-primary"></span> +221 78 151 85 92</a>
                            <span class="divider">|</span>
                            <a href="#"><span class="mai-mail text-primary"></span> contact.ecarnet@gmail.com</a>
                        </div>
                    </div>
                    <div class="col-sm-4 text-right text-sm">
                        <div class="social-mini-button">
                            <a href="#"><span class="mai-logo-facebook-f"></span></a>
                            <a href="#"><span class="mai-logo-twitter"></span></a>
                            <a href="#"><span class="mai-logo-instagram"></span></a>
                        </div>
                    </div>
                </div> <!-- .row -->
            </div> <!-- .container -->
        </div> <!-- .topbar -->

        <nav class="navbar navbar-expand-lg navbar-light shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="#"><span class="text-primary">E</span>-carnet</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupport"
                    aria-controls="navbarSupport" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupport">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="#">Accueil</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#about">A propos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#contact">Contact</a>
                        </li>
                        <li class="nav-item">
                            @if (Route::has('login'))
                                @auth
                                    <a href="{{ url('/dashboard') }}" class="btn btn-primary ml-lg-3">Tableau de Bord</a>
                                @else
                                    <a href="{{ route('login') }}" class="btn btn-primary ml-lg-3">Se Connecter</a>

                                    @if (Route::has('register'))
                                        <a href="{{ route('register') }}" class="btn btn-primary ml-lg-3">S'inscrire</a>
                                    @endif
                                @endauth
                            @endif
                        </li>
                    </ul>
                </div> <!-- .navbar-collapse -->
            </div> <!-- .container -->
        </nav>
    </header>

    <div class="back-to-top"></div>

    <div class="page-hero bg-image overlay-dark" style="background-image: url(../img/bg_image_1.jpg);">
        <div class="hero-section">
            <div class="container text-center wow zoomIn">
                <span class="subhead">La santé avant TOUT !</span>
                <h1 class="display-4">E-carnet</h1>
            </div>
        </div>
    </div>

    <div class="bg-light">
        <div class="page-section py-3 mt-md-n5 custom-index">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-4 py-3 py-md-0">
                        <div class="card-service wow fadeInUp">
                            <div class="circle-shape bg-secondary text-white">
                                <span class="mai-chatbubbles-outline"></span>
                            </div>
                            <p><span>Discuter</span> avec un docteur</p>
                        </div>
                    </div>
                    <div class="col-md-4 py-3 py-md-0">
                        <div class="card-service wow fadeInUp">
                            <div class="circle-shape bg-primary text-white">
                                <span class="mai-shield-checkmark"></span>
                            </div>
                            <p><span>E</span>-carnet</p>
                        </div>
                    </div>
                    <div class="col-md-4 py-3 py-md-0">
                        <div class="card-service wow fadeInUp">
                            <div class="circle-shape bg-accent text-white">
                                <span class="mai-basket"></span>
                            </div>
                            <p><span>E</span>-carnet</p>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- .page-section -->


        <div class="page-section pb-0" id="about">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 py-3 wow fadeInUp">
                        <h1>Bienvenue dans<br> E-carnet</h1>
                        <p class="text-grey mb-4">E-carnet est unr application qui met à la disposition de ses clients,
                            un carnet de santé
                            électronique.
                            Un patient aura la possibilité de </p>
                    </div>
                    <div class="col-lg-6 wow fadeInRight" data-wow-delay="400ms">
                        <div class="img-place custom-img-1">
                            <img src="../img/bg-doctor.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- .bg-light -->
    </div> <!-- .bg-light -->

    <div class="page-section">
        <div class="container">
            <h1 class="text-center wow fadeInUp">Prendre un rendez-vous</h1>

            <form class="main-form">
                <div class="row mt-5 ">
                    <div class="col-12 col-sm-6 py-2 wow fadeInLeft">
                        <input type="text" class="form-control" placeholder="Prenom">
                    </div>
                    <div class="col-12 col-sm-6 py-2 wow fadeInLeft">
                        <input type="text" class="form-control" placeholder="Nom">
                    </div>
                    <div class="col-12 col-sm-6 py-2 wow fadeInRight">
                        <input type="text" class="form-control" placeholder="Adresse email">
                    </div>
                    <div class="col-12 col-sm-6 py-2 wow fadeInLeft" data-wow-delay="300ms">
                        <input type="date" class="form-control">
                    </div>
                    <div class="col-12 col-sm-6 py-2 wow fadeInRight" data-wow-delay="300ms">
                        <select name="departement" id="departement" class="custom-select">
                            <option value="general">Département</option>
                            <option value="cardiology">Cardiologie</option>
                            <option value="dental">Dentiste</option>
                            <option value="neurology">Neurologie</option>
                            <option value="orthopaedics">Pédiatrie</option>
                        </select>
                    </div>
                    <div class="col-12 col-sm-6 py-2 wow fadeInUp" data-wow-delay="300ms">
                        <input type="text" class="form-control" placeholder="Numéro de téléphone">
                    </div>
                    <div class="col-12 py-2 wow fadeInUp" data-wow-delay="300ms">
                        <textarea name="message" id="message" class="form-control" rows="6"
                            placeholder="Entrer un message supplémentaire...."></textarea>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary mt-3 wow zoomIn">Enregistrer</button>
            </form>
        </div>
    </div> <!-- .page-section -->

    <footer class="page-footer" id="contact">
        <div class="container">
            <div class="row px-md-3">
                <div class="col-sm-6 col-lg-3 py-3">
                    <h5>E-carnet</h5>
                    <ul class="footer-menu">
                        <li><a href="#">Disponible 24h/24 7j/7</a></li>
                    </ul>
                </div>
                <div class="col-sm-6 col-lg-3 py-3">
                    <h5>Contact</h5>
                    <p class="footer-link mt-2">Thiès, Sénégal, Avenue Léopold Sédar SENGHOR</p>
                    <a href="#" class="footer-link">78 151 85 92</a>
                    <a href="#" class="footer-link">healthcare@temporary.net</a>


                </div>
            </div>

            <hr>

            <p id="copyright">Copyright &copy; 2022 <a href="" target="_blank">E-carnet</a>. Tous
                droits réservés</p>
        </div>
    </footer>

    <script src="../js/jquery-3.5.1.min.js"></script>

    <script src="../js/bootstrap.bundle.min.js"></script>

    <script src="../vendor/owl-carousel/js/owl.carousel.min.js"></script>

    <script src="../vendor/wow/wow.min.js"></script>

    <script src="../js/theme.js"></script>
</body>

</html>
