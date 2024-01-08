<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">
    <meta name="description" content="Formulaire d'inscription au programme bénévole CAN 2023">
    <meta name="author" content="SDSI-AEJ">
    <title>LISTE DES BENEFICIAIRES AU PROGRAMME BENEVOLE CAN 2023</title>

    <!-- Favicons-->
    <link rel="shortcut icon" href="{{ asset('assets/img/logo-oscn.png') }}" type="image/x-icon">
    <link rel="apple-touch-icon" type="image/x-icon" href="{{ asset('assets/img/logo-oscn.png') }}">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="72x72" href="{{ asset('assets/img/logo-oscn.png') }}">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="114x114" href="{{ asset('assets/img/logo-oscn.png') }}">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="144x144" href="{{ asset('assets/img/logo-oscn.png') }}">

    <!-- GOOGLE WEB FONT -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:thin,extra-light,light,100,200,300,400,500,600,700,800&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />

    <!-- BASE CSS -->
    @include('layouts.styles')
    @yield('css')

    <!-- YOUR CUSTOM CSS -->
    <link href="{{ asset('assets/css/custom.css') }}" rel="stylesheet">
</head>
<body>

<div id="loader_form">
    <div data-loader="circle-side-2"></div>
</div>
<!-- /Loader_form -->

@include('layouts.header')

<div id="main_container" class="visible">
    <div id="header_in">
        <div id="logo_in"><img src="{{ asset('assets/img/LOGOS-BENEVOLES.png') }}" width="135" height="120" data-retina="true" alt="Quote"></div>
    </div>
    @yield('content')
    <!-- /wrapper_in -->
</div><!-- /main_container -->

<!-- Modal terms -->
<div class="modal fade" id="terms-txt" tabindex="-1" role="dialog" aria-labelledby="termsLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Formulaire de Réclamation</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
              <span style="color:red">Seules les personnes retenues peuvent faire une réclamation.<span>
              <br><br>
                 <form method="get" action="{{route('store.reclamation')}}">
                      
                <div class="form-group">
                  <label for="nom">Nom & prénoms <span style="color: red;">*</span></label>
                  <input type="text" class="form-control" id="nom" name="nom" placeholder="Nom & prénoms" required>
                </div>
                <div class="form-group">
                  <label for="nom">Téléphone <span style="color: red;">*</span></label>
                  <input type="text" class="form-control" id="telephone" name="telephone" placeholder="Votre numero de Téléphone" pattern="[0-9]{10}" title="Le numéro de téléphone doit contenir 10 chiffres" required>
                </div>
                <div class="form-group">
                   <label>Lieu de résidence à l'inscription <span style="color: red;">*</span></label>
                                                    <div class="styled-select">
                                                        {{ html()->select('lieu_residence_ins',$communes, old('lieu_residence_ins'))->class('required')->placeholder('Lieu de résidence à l\'inscription')->required(true) }}
                                                    </div>
                 
                </div>
                <div class="form-group">
                  <label for="email">Motif <span style="color: red;">*</span></label>
                  <select class="form-control" id="motif" name="motif" onchange="change_motif(this.value)" required>
                    <option value="">-</option>
                    <option value="1">Erreur sur le nom & prénoms</option>
                    <option value="2">Erreur sur le lieu de résidence</option>
                    <option value="3">Autre</option>
                  </select>
                </div>
                <div class="form-group" id="nom_correct_form" style="display:none;">
                  <label for="sujet">Nom correct <span style="color: red;">*</span></label>
                  <input type="text" class="form-control" id="nom_correct" name="nom_correct" placeholder="Nom & prénoms correct">
                </div>
                <div class="form-group" id="lieu_residence_id_form" style="display:none;">
                  <label for="email">Lieu de résidence <span style="color: red;">*</span></label>
                  <div class="styled-select">
                                                        {{ html()->select('lieu_residence_id',$communes, old('lieu_residence_id'))->class('required')->placeholder('Lieu de résidence')->required(true) }}
                                                    </div>
                </div>
                <div class="form-group" id="message_form" style="display:none;">
                  <label for="message">Message <span style="color: red;">*</span></label>
                  <textarea class="form-control" id="message" name="message" rows="3" placeholder="Votre réclamation"></textarea>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success btn-block">Envoyer</button>
               </div>
               
              </form>
            </div>
            
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!-- Modal Réclamation -->
  <div class="modal fade" id="reclamationModal" tabindex="-1" role="dialog" aria-labelledby="reclamationModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="reclamationModalLabel">Formulaire de Réclamation</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <!-- Formulaire de Réclamation -->
          <form>
            <div class="form-group">
              <label for="nom">Nom</label>
              <input type="text" class="form-control" id="nom" placeholder="Votre nom">
            </div>
            <div class="form-group">
              <label for="email">Email</label>
              <input type="email" class="form-control" id="email" placeholder="Votre email">
            </div>
            <div class="form-group">
              <label for="sujet">Sujet</label>
              <input type="text" class="form-control" id="sujet" placeholder="Sujet de la réclamation">
            </div>
            <div class="form-group">
              <label for="message">Message</label>
              <textarea class="form-control" id="message" rows="3" placeholder="Votre réclamation"></textarea>
            </div>
            <button type="submit" class="btn btn-primary btn-block">Envoyer</button>
          </form>
        </div>
      </div>
    </div>
  </div>

<!-- SCRIPTS -->
@include('layouts.scripts')
@yield('js')

</body>

</html>
