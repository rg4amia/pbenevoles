<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion | Page</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('login_assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('login_assets/css/fontawesome-all.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('login_assets/css/iofrm-style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('login_assets/css/iofrm-theme5.css') }}">
</head>
<body>
<div class="form-body">
    <div class="website-logo">
        <a href="index.html">
            <div class="logo">
                <img class="logo-size" src="{{asset('assets/img/logo-oscn.png')}}" alt="">
            </div>
        </a>
    </div>
    <div class="row">
        <div class="img-holder">
            <div class="bg"></div>
            <div class="info-holder">
                <img src="{{ asset('login_assets/images/graphic2.svg') }}" alt="">
            </div>
        </div>
        <div class="form-holder">
            <div class="form-content">
                <div class="form-items">
                    <h3>Acceder au back-office du module</h3>
                    <p>des inscriptions des bénévoles</p>
                    <div class="page-links">
                        <a href="login5.html" class="active">
                            Connexion
                        </a>
                    </div>
                    {{ html()->form('POST')->route('authenticate.auth')->open() }}
                        {{ html()->text('email')->class('form-control')->placeholder('E-mail Address')->required(true) }}
                        {{ html()->password('password')->class('form-control')->placeholder('Mot de Passe')->required(true) }}
                        <div class="form-button">
                            <button id="submit" type="submit" class="ibtn">Connexion</button>
                            <a href="forget5.html">Mot de passse oubliè?</a>
                        </div>
                    {{ html()->form()->close() }}
                    <div class="other-links">
                        {{--<span>Or login with</span><a href="#">Facebook</a><a href="#">Google</a><a href="#">Linkedin</a>--}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="{{ asset('login_assets/js/jquery.min.js') }}"></script>
<script src="{{ asset('login_assets/js/popper.min.js') }}"></script>
<script src="{{ asset('login_assets/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('login_assets/js/main.js') }}"></script>
</body>
</html>
