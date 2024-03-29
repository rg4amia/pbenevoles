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
                            <h2 class="content-header-title float-left mb-0">BÉNÉVOLES</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a>LISTE DES ASSOCIATIONS BENEVOLES CAN-2023</a>
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
                                                        {{ html()->date('date_debut')->class('form-control')->id('date_debut') }}
                                                    </div>
                                                    <div class="col-md-4">
                                                        {{ html()->date('date_fin')->class('form-control')->id('date_fin') }}
                                                    </div>
                                                    <div class="col-md-4">
                                                        {{ html()->select('departement', $departements, null)->class('form-control')->placeholder('Selectionner département')->id('departement') }}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mb-2">

                                                 <div class="row">
                                                    <div class="col-md-4">
                                                        {{ html()->select('region', $regions, null)->class('form-control')->placeholder('Selectionner region')->id('region') }}
                                                    </div>
                                                    <div class="col-md-4">
                                                        {{ html()->select('lieuresidence', $communes, null)->class('form-control')->placeholder('Selectionner lieu de residence')->id('lieuresidence') }}
                                                    </div>
                                                </div>
                
                                            </div>
                                            <button type="button" class="btn btn-primary" id="recherche_benevole"
                                                    data-dismiss="modal">Recherche
                                            </button>
                                        </form>
                                        <div id="benevoles">
                                            @include('backend.page.association.association')
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

        $('#recherche_benevole').on('click', function () {
            let region = $('#region').val();
            let date_debut = $('#date_debut').val();
            let date_fin = $('#date_fin').val();
            let lieuresidence = $('#lieuresidence').val();
            let sexe = $('#sexe').val();
            let nationalite = $('#nationalite').val();
            let scolarise = $('#scolarise').val();
            let handicape = $('#handicape').val();

            // récupérer les autres valeurs de filtre
            $.ajax({
                url: "{{ route('particulier.index') }}",
                method: "GET",
                data: {
                    region: region,
                    lieuresidence: lieuresidence,
                    date_debut: date_debut,
                    date_fin: date_fin,
                    sexe: sexe,
                    nationalite: nationalite,
                    scolarise: scolarise,
                    handicape: handicape,
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
                            let region = $('#region').val();
                            let date_debut = $('#date_debut').val();
                            let date_fin = $('#date_fin').val();
                            let lieuresidence = $('#lieuresidence').val();
                            let sexe = $('#sexe').val();
                            let nationalite = $('#nationalite').val();
                            let scolarise = $('#scolarise').val();
                            let handicape = $('#handicape').val();

                            let data = {
                                'region': region,
                                'date_debut': date_debut,
                                'date_fin': date_fin,
                                'lieuresidence': lieuresidence,
                                'sexe': sexe,
                                'nationalite': nationalite,
                                'scolarise': scolarise,
                                'handicape': handicape,
                            }
                            var link = "{{ route('particulier.benevoleexportexcel',['data' =>':data']) }}";
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
    </script>
@endsection
