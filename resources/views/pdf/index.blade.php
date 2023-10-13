
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>FICHE D’INSCRIPTION AU PROGRAMME BENEVOLE CAN 2023</title>
    <link href="{{ public_path('assets/css/font_opensan.css') }}" rel="stylesheet">
    <style type="text/css">
        /*    body {
               font-family: 'Open Sans', sans-serif;
           } */
        ol,
        table td,
        table th {
            margin: 0;
            padding: 0;
        }

        td {
            padding: 0;
        }

        .footer {
            position: fixed;
            left: 0;
            bottom: 0;
            width: 100%;
            background-color: #f5f5f5;
            padding: 10px;
        }

        .c2 {
            padding: 5pt;
            vertical-align: top;
            border-right-color: #000000;
            border-left-width: 1pt;
            border-bottom-width: 1pt;
            width: 160pt;
            border-top-color: #000000;
        }

        .c1 {
            color: #000000;
            font-weight: 400;
            text-decoration: none;
            vertical-align: baseline;
            font-size: 9pt;
            font-family: "Bookman Old Style";
            font-style: normal;
        }

        p {
            margin: 0;
            color: #000000;
            font-size: 11pt;
            font-family: "Arial";
        }

        .subtitle {
            padding-top: 0pt;
            color: #666666;
            font-size: 15pt;
            padding-bottom: 16pt;
            font-family: "Arial";
            line-height: 1.15;
            page-break-after: avoid;
            orphans: 2;
            widows: 2;
            text-align: left;
        }

        .image-container {
            border-radius: 50%;
            width: 200px;
            height: 200px;
        }

        .centered-table {
            margin-left: auto;
            margin-right: auto;
            /* text-align: center; */
        }

        .fixed-height-table {
            height: 300px; /* Remplace cette valeur par la hauteur souhaitée */
            overflow-y: auto; /* Ajoute une barre de défilement verticale si le contenu dépasse la hauteur fixée */
            margin-bottom: 2%;
        }
    </style>
</head>

<body>
<table>
    <tbody>
    <tr>
        <td>
            <img alt="" src="{{ public_path('assets/img/logodv.png') }}" style="height: 140px" />
        </td>
    </tr>
    </tbody>
</table>

<br>
<p style="text-align:center">
    <span style="font-family: 'Bookman Old Style'; font-size:18.0pt;font-weight: bold; color: #db863d;">FICHE D’INSCRIPTION AU PROGRAMME BENEVOLE CAN 2023</span>
</p>
<br>
@if ($benevole->photoidentite)
    {{-- <div class="image-container"> --}}
    <img src='{{ storage_path("app/public/".$benevole->photoidentite) }}' height="80" width="95" style="border-radius: 10%;">
    {{-- </div> --}}
@endif
<table class="centered-table fixed-height-table">
    <tbody>
    <tr>
        <td class="c2">
            <span class="c1" style="font-weight: 600">NOM :</span>
        </td>
        <td class="c2" rowspan="1">
            <span class="c1">{{ $benevole->nom }}</span>
        </td>
    </tr>
    <tr class="c7">
        <td class="c2" rowspan="1">
            <span class="c1" style="font-weight: 600">PR&Eacute;NOM :</span>
        </td>
        <td class="c2" rowspan="1">
            <span class="c1">{{ $benevole->prenoms }}</span>
        </td>
    </tr>
    <tr class="c7">
        <td class="c2" rowspan="1">
            <span class="c1" style="font-weight: 600">SEXE :</span>
        </td>
        <td class="c2" rowspan="1">
            <span class="c1">{{ $benevole->sexe->libelle }}</span>
        </td>
    </tr>
    <tr class="c7">
        <td class="c2" rowspan="1">
            <span class="c1" style="font-weight: 600">TELEPHONE :</span>
        </td>
        <td class="c2" rowspan="1">
            <span class="c1">{{ $benevole->telephone }}</span>
        </td>
    </tr>
    <tr class="c7">
        <td class="c2" rowspan="1">
            <span class="c1" style="font-weight: 600">CNI :</span>
        </td>
        <td class="c2" rowspan="1">
            <span class="c1">{{ $benevole->numero_piece }}</span>
        </td>
    </tr>
    <tr class="c7">
        <td class="c2" rowspan="1">
            <span class="c1" style="font-weight: 600">MATRICULE :</span>
        </td>
        <td class="c2" rowspan="1">
            <span class="c1">{{ $benevole->matricule }}</span>
        </td>
    </tr>

    </tbody>
</table>
{{--<p>
    <img src='{{ $qrcode }}' height="70">
</p>--}}

{{--<p style="margin-top: 0px;">
    <img alt="" src="{{ public_path('assets/images/bar_colorer.png') }}" style="height: 20%; width:100%" />
</p>--}}

</body>

</html>
