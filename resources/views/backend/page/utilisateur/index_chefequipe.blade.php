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
                            <h2 class="content-header-title float-left mb-0">CHEF D'EQUIPE</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a>LISTE DES CHEFS D'EQUIPES</a>
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
                                <div class="col-xl-12 col-lg-12">
                                    <div class="card">
                                        <form action="#">
                                            <input type="hidden" id="type_valider" name="type" value="valider">
                                            <div class="mb-2">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <label>Lieu de résidence</label>
                                                        {{ html()->select('lieuresidence', $communes, null)->class('form-control')->placeholder('Selectionner lieu residence')->id('lieuresidence') }}
                                                    </div>

                                                    <div class="col-md-4">
                                                        <label>Région</label>
                                                        {{ html()->select('region', $regions, null)->class('form-control')->placeholder('Selectionner region / district')->id('region') }}
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label>Département</label>
                                                        {{ html()->select('departement', $departements, null)->class('form-control')->placeholder('Selectionner département')->id('departement') }}
                                                    </div>
                                    
                                                </div>
                                            </div>

                                            <div class="mb-2">
                                                <div class="row">
                                                    
                                                    <div class="col-md-4">
                                                        <label>Superviseur</label>
                                                       <select class="select2 form-control" id="superviseur" name="superviseur">
                                                        <option value="0"></option>
                                                        @foreach($superviseurs as $superviseur)
                                                        <option value="{{$superviseur->id}}">{{$superviseur->name}} ({{$superviseur->telephone}})</option>
                                                        @endforeach
                                                    </select>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label>Nom & prénoms</label>
                                                        <input type="text" name="nom" id="nom" value="" placeholder="Nom & prénoms" class="form-control">
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label>Téléphone</label>
                                                        <input type="text" name="telephone" id="telephone" value="" placeholder="Téléphone" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                            <button type="button" class="btn btn-primary" id="recherche_chefequipe"
                                                    data-dismiss="modal">Recherche
                                            </button>
                                        </form>
                                        @if(Auth::user()->type==3 || Auth::user()->type==4 || Auth::user()->type==5 || Auth::user()->type==6)
                                        <div class="mb-2">
                                            <div class="row">
                                                <div class="col-md-4"></div>
                                               <div class="col-md-4">
                                                    <label><strong style="color:red;">Sélectionnez un superviseur pour affécter des chefs d'équipe</strong></label>
                                                    <select class="select2 form-control" id="chefequipe" name="chefequipe">
                                                        <option value="0"></option>
                                                        @foreach($superviseurs as $superviseur)
                                                        <option value="{{$superviseur->id}}">{{$superviseur->name}} ({{$superviseur->telephone}})</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-md-4"></div>
                                            </div>
                                            
                                        </div>
                                        @endif

                                        <div id="benevoles">
                                            @include('backend.page.utilisateur.chefequipe')
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

        $('#recherche_chefequipe').on('click', function () {
            let region = $('#region').val();
            let departement = $('#departement').val();
            let superviseur = $('#superviseur').val();
            let lieuresidence = $('#lieuresidence').val();
            let nom = $('#nom').val();
            let telephone = $('#telephone').val();

            //console.log(telephone);

            // récupérer les autres valeurs de filtre
            $.ajax({
                url: "{{ route('chefequipe.index') }}",
                method: "GET",
                data: {
                    region: region,
                    departement: departement,
                    superviseur: superviseur,
                    lieuresidence: lieuresidence,
                    nom: nom,
                    telephone: telephone
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
                    
                    @if(Auth::user()->type==3 || Auth::user()->type==4 || Auth::user()->type==5 || Auth::user()->type==6)
                    {
                        extend: 'colvis',
                        text: feather.icons['plus'].toSvg({class: 'font-small-4 mr-50'}) + 'Affecter',
                        className: 'btn btn-relief-danger',
                        action: function (e, dt, node, config) {
                            var checkedValues = [];
                            var chefequipe = $('#chefequipe').val();
                    
                            //alert(chefequipe);
                            $('.select-row:checked').each(function () {
                                    checkedValues.push($(this).val());
                                });
                            if(checkedValues.length < 1){
                            alert('Aucun bénévole selectionné!!!');
                            return false
                            } else if(chefequipe == 0){alert('Aucun chef d\'équipe selectionné!!!');} 
                            else{
                                var string = checkedValues.toString();
                                console.log(string);

                                $.ajax({
                                            url: "{{ route('utilisateur.affecter.benevole') }}",
                                            method: "GET",
                                            data: {
                                                checkedValues: checkedValues,
                                                chefequipe: chefequipe,
                                            },
                                            success: function (response) {
                                                location.reload();
                                            }
                                        });

                               }
                            
                        }
                    },
                    @endif
                    {
                        extend: 'colvis',
                        text: feather.icons['file'].toSvg({class: 'font-small-4 mr-50'}) + 'Extrait Excel',
                        className: 'btn btn-relief-warning mr-2',
                        action: function (e, dt, node, config) {
                            let region = $('#region').val();
                            let departement = $('#departement').val();
                            let superviseur = $('#superviseur').val();
                            let lieuresidence = $('#lieuresidence').val();
                            let nom = $('#nom').val();
                            let telephone = $('#telephone').val();
                            

                            let data = {
                                'region': region,
                                'departement': departement,
                                'superviseur': superviseur,
                                'lieuresidence': lieuresidence,
                                'nom': nom,
                                'telephone': telephone,
                                
                            }
                            var link = "{{ route('chefequipe.chefequipeexportexcel',['data' =>':data']) }}";
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
    <script>
        var checkedValues = [];
        $('.select-row:checked').each(function () {
            checkedValues.push($(this).val());
        });

        //console.log(checkedValues);


        // Code jQuery pour la sélection de tous les éléments
        $('#select-all').click(function () {
            $('.select-row').prop('checked', this.checked);
            console.log('check');
        });

        // Code jQuery pour la sélection d'un élément à la fois avec une action multiple
        $('.select-row').click(function () {
            if ($('.select-row:checked').length == $('.select-row').length) {
                $('#select-all').prop('checked', true);
            } else {
                $('#select-all').prop('checked', false);
            }
        });

        
    </script>
@endsection
