var tableDetails;
/*event show modal annotation*/
$('#detail').on('show.bs.modal', function (event) {


    url_detail = window.location.href;
    console.log(url_detail);

    var button = $(event.relatedTarget);
    var id = button.data('id');

    var url_detail ;
    //'{{ route('backend.financement-projet.detail-projet',':id') }}'

    url_detail = url_detail.replace(':id', id);

    axios.get(url_detail).then(function (response) {
        console.table(response.data);
        $('#numdossier').text(response.data.matriculeprojet)
        $('#raisonsociale').text(response.data.raisonsociale)
        $('#sigle').text(response.data.sigle)
        $('#typeprojet').text(response.data.typeprojet.libelle)
        $('#typeprogramme').text(response.data.typeprogramme.libelle)
        $('#secteuractivite').text(response.data.secteuractivite.libelle)
        $('#district').text(response.data.district.libelle)
        $('#division').text(response.data.divisionregionaleaej.libelle)
        $('#region').text(response.data.region.nom)
        $('#commune').text(response.data.commune.nom)
        $('#localite').text(response.data.ville.nom)
        $('#descriptionactivite').text(response.data.descriptionactivite)
        $('#formejuridique').text(response.data.formejuridique.libelle)
        $('#registrecommerce').text(response.data.registrecommerce)
        $('#justificationprojet').val(response.data.justificationprojet)
        $('#nbreemploi').text(response.data.nombreemploi)
        $('#descriptionexperienceactive').val(response.data.descriptionexperiencedansactivite)
        $('#motifnonremboursementpret').val(response.data.motifnonremboursementpret)
        $('#decriptionprocessusproduction').text(response.data.descriptionprocessusproduction)
        $('#autresecteuractivite').text(response.data.autresecteuractivite)
        $('#objetdemande').text(response.data.objetdemande)
        $('#ville').text(response.data.ville.nom)
        $('#clientspotentieletconcourent').val(response.data.clientspotentielsetconcurrent)
        $('#sourceapprovionementemoyenne').val(response.data.sourceapprovisionnement)
        $('#descriptionproduitoffert').val(response.data.descriptionproduitoffert)
        $('#marchesclient').val(response.data.marchesclient)
        $('#concurrent').val(response.data.concurrent)
        $('#produitservice').val(response.data.produitservice)
        $('#besointechnique').val(response.data.besointechnique)
        $('#fournisseur').val(response.data.fournisseur)
        $('#planmarketing').val(response.data.planmarketing)
        $('#autrebesoin').val(response.data.autrebesoin)
        $('#caffaireprevisionnel1').val(response.data.caffaireprevisionnel1)
        $('#caffaireprevisionnel2').val(response.data.caffaireprevisionnel2)
        $('#caffaireprevisionnel3').val(response.data.caffaireprevisionnel3)
        $('#caffaireprevisionnel4').val(response.data.caffaireprevisionnel4)
        $('#caffaireprevisionnel5').val(response.data.caffaireprevisionnel5)

        $('#chargeprevisionnelle1').val(response.data.chargeprevisionnelle1)
        $('#chargeprevisionnelle2').val(response.data.chargeprevisionnelle2)
        $('#chargeprevisionnelle3').val(response.data.chargeprevisionnelle3)
        $('#chargeprevisionnelle4').val(response.data.chargeprevisionnelle4)
        $('#chargeprevisionnelle5').val(response.data.chargeprevisionnelle5)

        $('#resultatnet1').val(response.data.resultatnet1)
        $('#resultatnet2').val(response.data.resultatnet2)
        $('#resultatnet3').val(response.data.resultatnet3)
        $('#resultatnet4').val(response.data.resultatnet4)
        $('#resultatnet5').val(response.data.resultatnet5)

        $('#comptecontribuable').val(response.data.comptecontribuable)
        $('#comptebancaire').val(response.data.comptebancaire)
        $('#coutprojet').val(response.data.coutprojet)
    }).catch(function (error) {
        console.log(error);
    });

    $('#tableDetail').dataTable().fnClearTable();
    $('#tableDetail').dataTable().fnDestroy();

    //'{{ route('backend.financement-projet.detail-etape-validation',':id') }}'
    var url;
    url = url.replace(':id', id);

    tableDetails =  $("#tableDetail").DataTable({
        "language": {
            "lengthMenu": "_MENU_",
            "zeroRecords": "Rien n'a été trouvé - désolé",
            "info": "_PAGE_ de _PAGES_",
            "infoEmpty": "Aucun dossier disponible",
            "processing":  "Traitement...",
            "search":      "Recherche:",
            "infoFiltered": "(filtré de _MAX_ total des enregistrements)",
            "paginate": {
                "first":   "Premier",
                "last":    "Dernier",
                "next":    "Suivant",
                "previous":"Précédent"
            },
        },
        processing: true,
        serverSide: true,
        ajax: {
            url: url
        },
        dom:'<"card-header border-bottom p-1"<"head-label"><"dt-action-buttons text-right"B>><"d-flex justify-content-between align-items-center mx-0 row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6"f>>t<"d-flex justify-content-between mx-0 row"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>',
        colVis: {
            exclude: [ 0 ]
        },
        columns: [
            {data: 'date', visible: true},
            {data: 'etape', visible: true},
            {data: 'commentaire', visible: true},
            {data: 'note', visible: true},
            {data: 'notecomite', visible: true},
            {data: 'actions', orderable: false, searchable: false, visible: true},
        ],
        buttons: [
            {
                extend: 'colvis',
                text: feather.icons['eye'].toSvg({ class: 'font-small-4 mr-50' }) + 'Colonne',
                className: 'btn btn-relief-success dropdown-toggle mr-2',
            },
            {
                extend: 'collection',
                className: 'btn btn-relief-primary dropdown-toggle mr-2',
                text: feather.icons['share'].toSvg({ class: 'font-small-4 mr-50' }) + 'Extraction',
                buttons: [
                    {
                        extend: 'print',
                        text: feather.icons['printer'].toSvg({ class: 'font-small-4 mr-50' }) + 'Print',
                        className: 'dropdown-item',
                        exportOptions: { columns: [3, 4, 5, 6, 7] }
                    },
                    {
                        extend: 'csv',
                        text: feather.icons['file-text'].toSvg({ class: 'font-small-4 mr-50' }) + 'Csv',
                        className: 'dropdown-item',
                        exportOptions: { columns: [3, 4, 5, 6, 7] }
                    },
                    {
                        extend: 'excel',
                        text: feather.icons['file'].toSvg({ class: 'font-small-4 mr-50' }) + 'Excel',
                        className: 'dropdown-item',
                        exportOptions: { columns: [3, 4, 5, 6, 7] }
                    },
                    {
                        extend: 'pdf',
                        text: feather.icons['clipboard'].toSvg({ class: 'font-small-4 mr-50' }) + 'Pdf',
                        className: 'dropdown-item',
                        exportOptions: { columns: [3, 4, 5, 6, 7] }
                    },
                    {
                        extend: 'copy',
                        text: feather.icons['copy'].toSvg({ class: 'font-small-4 mr-50' }) + 'Copy',
                        className: 'dropdown-item',
                        exportOptions: { columns: [3, 4, 5, 6, 7] }
                    }
                ],
                init: function (api, node, config) {
                    $(node).removeClass('btn-secondary');
                    $(node).parent().removeClass('btn-group');
                    setTimeout(function () {
                        $(node).closest('.dt-buttons').removeClass('btn-group').addClass('d-inline-flex');
                    }, 50);

                }
            },
        ],
    });

});
