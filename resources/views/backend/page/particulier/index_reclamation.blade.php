@extends('backend.panels.main')
@section('title')
    LISTE DES BENEVOLES CAN-2023
@endsection
@section('css')
    <style>
        .card-body-custom {
            -webkit-box-flex: 1;
            -webkit-flex: 1 1 auto;
            -ms-flex: 1 1 auto;
            flex: 1 1 auto;
            min-height: 1px;
        }

        .dt-buttons .dt-button-collection {
            margin: 5px 0 !important;
            white-space: nowrap;
        }

        .dt-button.buttons-columnVisibility {
            display: block;
            width: 100%;
            padding: 0.65rem 1.28rem;
            clear: both;
            font-weight: 400;
            text-align: inherit;
            white-space: nowrap;
            background-color: transparent;
            border: 0;
        }

        .dt-button.buttons-columnVisibility.active {
            display: block;
            width: 100%;
            padding: 0.65rem 1.28rem;
            clear: both;
            font-weight: 700;
            text-align: inherit;
            white-space: nowrap;
            background-color: rgba(0, 166, 80, 0.06) !important;
            color: #00a650 !important;
            border: 0;
        }
    </style>
@endsection
@section('content')
    <!-- BEGIN: Content-->
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h2 class="content-header-title float-left mb-0">RECLAMATION</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a>LISTE DES RECLAMATIONS CAN-2023</a>
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            @include('backend.panels.inc.flash')
            @include('backend.panels.inc.flash_admin')
            <div class="content-body">
                <div class="row" id="table-borderless">
                    <div class="col-12">
                        <div class="card user-profile-list">
                            <div class="card-body">
                                <div class="float-right">
                                    {{-- <button type="button"
                                             data-toggle="modal"
                                             data-target="#addcolonne"
                                             class="btn btn-icon btn-icon btn-primary mr-0 waves-effect waves-light">
                                         <i data-feather="list"></i>
                                         Ajouter Colonne
                                     </button>--}}
                                </div>
                                <div class="col-xl-12 col-lg-12">
                                    <div class="card">
                                        <form action="#">
                                            <input type="hidden" id="type_valider" name="type" value="valider">
                                            <div class="mb-2">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <label>Date début:</label>
                                                        {{ html()->date('date_debut')->class('form-control')->id('date_debut') }}
                                                    </div>
                                                    <div class="col-md-4">
                                                         <label>Date fin:</label>
                                                        {{ html()->date('date_fin')->class('form-control')->id('date_fin') }}
                                                    </div>
                                                    <div class="col-md-4">
                                                         <label>Lieu de résidence:</label>
                                                        {{ html()->select('lieuresidence', $communes, null)->class('form-control')->placeholder('Selectionner lieu residence')->id('lieuresidence') }}
                                                    </div>
                                                    
                                                </div>
                                                
                                            </div>

                                            <div class="mb-2">
                                                <div class="row">
                                                    
                                                    <div class="col-md-4">
                                                         <label>Nom & prénom:</label>
                                                       <input type="text" name="nom" id="nom" placeholder="Nom & téléphone" class="form-control">
                                                    </div>
                                                    <div class="col-md-4">
                                                         <label>Téléphone:</label>
                                                       <input type="text" name="telephone" id="telephone" placeholder="Téléphone" class="form-control">
                                                    </div>
                                                    <div class="col-md-4">
                                                         <label>Type de réclamation:</label>
                                                         <select name="type_reclamation" id="type_reclamation" class="form-control">
                                                            <option value="">Selectionner type de reclamation</option>
                                                             <option value="1">Erreur sur le nom</option>
                                                             <option value="2">Erreur sur le lieu de residence</option>
                                                             <option value="3">Autre</option>
                                                         </select>
                                                    </div>
                                                </div>
                                                
                                            </div>

                                            <button type="button" class="btn btn-primary" id="recherche_reclamation"
                                                    data-dismiss="modal">Recherche
                                            </button>
                                        </form>

                                        <div id="benevoles">
                                            @include('backend.page.particulier.reclamation')
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>
        /*initialisation des champs textarea*/
        $('textarea').each(function () {
            $(this).val($(this).val().trim());
        });

        $(function () {
            loadTable();
            $('body').on('click', '.pagination a', function (e) {
                e.preventDefault();
                $('#load').append('<img style="position: absolute; left: 0; top: 0; z-index: 10000;" src="https://i.imgur.com/v3KWF05.gif />');
                var url = $(this).attr('href');
                window.history.pushState("", "", url);
                loadBenevole(url);
            });

            function loadBenevole(url) {
                $.ajax({
                    url: url
                }).done(function (data) {
                    console.log('test' + data);
                    $('#benevoles').html(data);
                    loadTable();
                }).fail(function () {
                    console.log("Failed to load data!");
                });
            }
        });

        $('#recherche_reclamation').on('click', function () {
            
            let date_debut = $('#date_debut').val();
            let date_fin = $('#date_fin').val();
            let lieuresidence = $('#lieuresidence').val();
            let nom = $('#nom').val();
            let telephone = $('#telephone').val();
            let type_reclamation = $('#type_reclamation').val();

            // récupérer les autres valeurs de filtre
            $.ajax({
                url: "{{ route('reclamation.index') }}",
                method: "GET",
                data: {
                    date_debut: date_debut,
                    date_fin: date_fin,
                    lieuresidence: lieuresidence,
                    nom: nom,
                    telephone: telephone,
                    type_reclamation:type_reclamation
                },
                success: function (response) {
                    $('#benevoles').html(response);
                    loadTable();
                }
            });
        });

        function loadTable() {

            $('#tableBenevole').DataTable({
                "language": {
                    "lengthMenu": "_MENU_",
                    "zeroRecords": "Rien n'a été trouvé - désolé",
                    "info": "_PAGE_ de _PAGES_",
                    "infoEmpty": "Aucun dossier disponible",
                    "processing": "Traitement...",
                    "search": "Recherche:",
                    "infoFiltered": "(filtré de _MAX_ total des enregistrements)",
                    "paginate": {
                        "first": "Premier",
                        "last": "Dernier",
                        "next": "Suivant",
                        "previous": "Précédent"
                    },
                },
                pageLength: 25,
                bPaginate:false,
                processing: true,
              //  serverSide: false,
                dom: '<"card-header border-bottom p-1"<"head-label"><"dt-action-buttons text-right"B>><"d-flex justify-content-between align-items-center mx-0 row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6"f>>t<"d-flex justify-content-between mx-0 row"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>',
                buttons: [
                    {
                        extend: 'colvis',
                        text: feather.icons['file'].toSvg({class: 'font-small-4 mr-50'}) + 'Extrait Excel',
                        className: 'btn btn-relief-warning mr-2',
                        action: function (e, dt, node, config) {
                            let date_debut = $('#date_debut').val();
                            let date_fin = $('#date_fin').val();
                            let lieuresidence = $('#lieuresidence').val();
                            let nom = $('#nom').val();
                            let telephone = $('#telephone').val();
                            let type_reclamation = $('#type_reclamation').val();

                            let data = {
                                'date_debut': date_debut,
                                'date_fin': date_fin,
                                'lieuresidence': lieuresidence,
                                'nom': nom,
                                'telephone': telephone,
                                'type_reclamation': type_reclamation,
                            }
                            var link = "{{ route('reclamation.reclamationexportexcel',['data' =>':data']) }}";
                            link = link.replace(':data', encodeURIComponent(JSON.stringify(data)));
                            location.href = link
                        }
                    },
                    {
                        extend: 'colvis',
                        text: feather.icons['eye'].toSvg({class: 'font-small-4 mr-50'}) + 'Colonne',
                        className: 'btn btn-relief-success dropdown-toggle mr-2',
                    },
                ],
            });
        }

        function changestate(reclamation_id,state){
            //alert(state);
            if(state == 2){
                  rep = confirm('Cette reclamation a t\'elle été traité ?')
                }else{
                  rep = confirm('Voulez-vous annulé le traitement ?')
                }

              var url = "{{ url('admin/reclamation/traitement_reclamation') }}/"+reclamation_id+"/"+state;
             
              if(rep){
                       window.location.href = url;
                     }

        }
    </script>
@endsection
