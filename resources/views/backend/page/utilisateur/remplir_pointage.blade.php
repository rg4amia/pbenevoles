@extends('backend.panels.main')
@section('title')
  POINTAGES
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
                            <h2 class="content-header-title float-left mb-0">POINTAGE</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a>Du {{$pointage->date}} - {{$pointage->periode}}</a>
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
                                    
                                        <div id="benevoles">
                                            
                                            <div class="table-responsive mb-3 text-nowrap">
                                                <table id="tableBenevole" class="table">
                                                    <thead>
                                                    <tr>
                                                        <th>Nom & prénoms</th>
                                                        <th>Téléphone</th>
                                                        <th>Pointage</th>
                                                        
                                                    </tr>
                                                    </thead>
                                                    <tbody class="table-border-bottom-0" id="tableBenevoleBody">
                                                    @forelse($benevoles as $key => $benevole)
                                                    @php $benevole_check = App\Helpers\Helper::get_eleve_pointage($benevole->id,$pointage->id); @endphp
                                                        <tr>
                                                            <td class="large-cell">{{ $benevole->nom }}</td>
                                                            <td class="large-cell">{{ $benevole->telephone }}</td>
                                                            <td class="large-cell">
                                                                <select class="form-control" id="check{{$benevole->id}}" name="check{{$benevole->id}}" onchange="updateChecking({{$benevole->id}},{{$pointage->id}},this.value)" <?php if($pointage->file_pointage){echo 'disabled';} ?>>
                                                                    <option value=""></option>
                                                                    <option value="1" <?php if($benevole_check==1){echo 'selected';} ?> >Présent</option>
                                                                    <option value="2" <?php if($benevole_check==2){echo 'selected';} ?> >Absent</option>
                                                                    <option value="3" <?php if($benevole_check==3){echo 'selected';} ?> >Permissionnaire</option>
                                                                </select>
                                                                <span id="load{{$benevole->id}}" style="display:none"><img src="{{asset('loading_2.gif')}}" width="25" height="25"> </span><span id="done{{$benevole->id}}" style="display:none; color: green;">Enrégistré ..</span>
                                                            </td>
                                                        </tr>
                                                    @empty
                                                    @endforelse
                                                    </tbody>
                                                </table>

                                            </div>
                                            <div><button class="btn btn-warning">Total : {{$totalbenevole}}</button></div>
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

        $('#recherche_beneficiaire').on('click', function () {
            let region = $('#region').val();
            let nom = $('#nom').val();
            let telephone = $('#telephone').val();
            let lieuresidence = $('#lieuresidence').val();

            //console.log(telephone);

            // récupérer les autres valeurs de filtre
            $.ajax({
                url: "{{ route('beneficiaire.index') }}",
                method: "GET",
                data: {
                    region: region,
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
                    // {
                    //     extend: 'colvis',
                    //     text: feather.icons['file'].toSvg({class: 'font-small-4 mr-50'}) + 'Extrait Excel',
                    //     className: 'btn btn-relief-warning mr-2',
                    //     action: function (e, dt, node, config) {
                    //         let region = $('#region').val();
                    //         let date_debut = $('#date_debut').val();
                    //         let date_fin = $('#date_fin').val();
                    //         let lieuresidence = $('#lieuresidence').val();
                    //         let sexe = $('#sexe').val();
                    //         let nationalite = $('#nationalite').val();
                    //         let scolarise = $('#scolarise').val();
                    //         let handicape = $('#handicape').val();

                    //         let data = {
                    //             'region': region,
                    //             'date_debut': date_debut,
                    //             'date_fin': date_fin,
                    //             'lieuresidence': lieuresidence,
                    //             'sexe': sexe,
                    //             'nationalite': nationalite,
                    //             'scolarise': scolarise,
                    //             'handicape': handicape,
                    //         }
                    //         var link = "{{ route('particulier.benevoleexportexcel',['data' =>':data']) }}";
                    //         link = link.replace(':data', encodeURIComponent(JSON.stringify(data)));
                    //         location.href = link
                    //     }
                    // },
                    // {
                    //     extend: 'colvis',
                    //     text: feather.icons['plus'].toSvg({class: 'font-small-4 mr-50'}) + 'Nouveau pointage',
                    //     className: 'btn btn-warning',
                    //     action:function () {
                    //                             $('#inlineForm').modal('show');
                    //                         }
                    // },
                    // {
                    //     extend: 'colvis',
                    //     text: feather.icons['eye'].toSvg({class: 'font-small-4 mr-50'}) + 'Colonne',
                    //     className: 'btn btn-relief-success dropdown-toggle mr-2',
                    // },
                ],
            });
        }

        function updateChecking(eleve,cour_id,check){

        $('#load'+eleve).fadeIn();
         
        var url_note = "{{ url('admin/pointage/save_pointage') }}/"+eleve+"/"+cour_id+"/"+check;
        $.ajax({type: "get",url: url_note,success: function(data){
          $('#load'+eleve).fadeOut(1000);
          $('#done'+eleve).fadeIn(3000);
          $('#done'+eleve).fadeOut(2000);
        }});

    
     }
    </script>
@endsection
