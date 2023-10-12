<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">
    <meta name="description" content="Formulaire d'inscription au programme bénévole CAN 2023">
    <meta name="author" content="SDSI-AEJ">
    <title>FORMULAIRE D’INSCRIPTION AU PROGRAMME BENEVOLE CAN 2023</title>

    <!-- Favicons-->
    <link rel="shortcut icon" href="{{ asset('assets/img/favicon.ico') }}" type="image/x-icon">
    <link rel="apple-touch-icon" type="image/x-icon" href="{{ asset('assets/img/apple-touch-icon-57x57-precomposed.png') }}">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="72x72" href="{{ asset('assets/img/apple-touch-icon-72x72-precomposed.png') }}">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="114x114" href="{{ asset('assets/img/apple-touch-icon-114x114-precomposed.png') }}">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="144x144" href="{{ asset('assets/img/apple-touch-icon-144x144-precomposed.png') }}">

    <!-- GOOGLE WEB FONT -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@300;400;700&display=swap" rel="stylesheet">

    <!-- BASE CSS -->
    @include('layouts.styles')
    @yield('css')

    <!-- YOUR CUSTOM CSS -->
    <link href="{{ asset('assets/css/custom.css') }}" rel="stylesheet">

</head>

<body>

<div id="loader_form">
    <div data-loader="circle-side-2"></div>
</div><!-- /Loader_form -->

@include('layouts.header')

<div id="main_container" class="visible">

    <div id="header_in">
        <div id="logo_in"><img src="{{ asset('assets/img/logo_black.png') }}" width="160" height="48" data-retina="true" alt="Quote"></div>
    </div>

    @yield('content')
    <!-- /wrapper_in -->
</div><!-- /main_container -->

<div id="additional_links">
    <ul>
        <li>© Quote</li>
        <li><a href="https://1.envato.market/05xEM" class="animated_link">Purchase this template</a></li>
        <li><a href="index_2.html" class="animated_link">Demo Slider</a></li>
        <li><a href="index_3.html" class="animated_link">With UPLOAD</a></li>
        <li><a href="index_4.html" class="animated_link">With Branch</a></li>
        <li><a href="index_5.html" class="animated_link">Full Page View</a></li>
        <li><a href="shortcodes.html" class="animated_link">Shortcodes</a></li>
    </ul>
</div><!-- /add links -->

<!-- Modal terms -->
<div class="modal fade" id="terms-txt" tabindex="-1" role="dialog" aria-labelledby="termsLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Terms and conditions</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Lorem ipsum dolor sit amet, in porro albucius qui, in <strong>nec quod novum accumsan</strong>, mei ludus tamquam dolores id. No sit debitis meliore postulant, per ex prompta alterum sanctus, pro ne quod dicunt sensibus.</p>
                <p>Lorem ipsum dolor sit amet, in porro albucius qui, in nec quod novum accumsan, mei ludus tamquam dolores id. No sit debitis meliore postulant, per ex prompta alterum sanctus, pro ne quod dicunt sensibus. Lorem ipsum dolor sit amet, <strong>in porro albucius qui</strong>, in nec quod novum accumsan, mei ludus tamquam dolores id. No sit debitis meliore postulant, per ex prompta alterum sanctus, pro ne quod dicunt sensibus.</p>
                <p>Lorem ipsum dolor sit amet, in porro albucius qui, in nec quod novum accumsan, mei ludus tamquam dolores id. No sit debitis meliore postulant, per ex prompta alterum sanctus, pro ne quod dicunt sensibus.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn_1" data-bs-dismiss="modal">Close</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!-- SCRIPTS -->
@include('layouts.scripts')
@yield('js')

</body>

</html>
