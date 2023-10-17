@extends('backend.panels.main')

@section('css')
    <style>
        .small-cell {
            width: 100px;
            height: 30px;
        }

        .large-cell {
            width: 300px;
            height: 30px;
        }
    </style>
@endsection
@section('content')
    <div class="app-content content ">
        <div class="content-overlay">
        </div>
        <div class="header-navbar-shadow">
        </div>
        <div class="content-wrapper">
            @include('backend.panels.inc.flash')
            @include('backend.panels.inc.flash_admin')
            <div class="content-header row">
            </div>
            <div class="content-body">
                <div class="col-12 grid-margin">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">LISTE DES BENEVOLES CAN-2023</h4>

                            <div class="dt-action-buttons text-end pt-3 pt-md-0">
                                <div class="dt-buttons">
                                    <button
                                        class="dt-button buttons-collection dropdown-toggle btn btn-label-primary me-2"
                                        tabindex="0" aria-controls="DataTables_Table_0" type="button"
                                        aria-haspopup="dialog" aria-expanded="false"><span><i
                                                class="ti ti-file-export me-sm-1"></i> <span
                                                class="d-none d-sm-inline-block">Export</span></span><span
                                            class="dt-down-arrow">▼</span></button>
                                    <button class="dt-button create-new btn btn-primary" tabindex="0"
                                            aria-controls="DataTables_Table_0" type="button"><span><i
                                                class="ti ti-plus me-sm-1"></i> <span class="d-none d-sm-inline-block">Add New Record</span></span>
                                    </button>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 grid-margin stretch-card">
                                    <div class="table-responsive text-nowrap">
                                        <table class="table" id="tableParticulier">
                                            <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Photo</th>
                                                <th>Nom</th>
                                                <th>Prenom(s)</th>
                                                <th>Tél.</th>
                                                <th>Sexe</th>
                                                <th>T. pièces</th>
                                                <th>CNI</th>
                                                <th>residence</th>
                                                <th>Région</th>
                                                <th>Département</th>
                                                <th>Scolarisé</th>
                                                <th>Niveau S.</th>
                                                <th>Diplôme</th>
                                                <th>Situation Pro.</th>
                                            </tr>
                                            </thead>
                                            <tbody class="table-border-bottom-0">
                                            @forelse($benevoles as $key => $benevole)
                                                <tr>
                                                    <td class="large-cell">{{ $key + 1 }}</td>
                                                    <td class="large-cell">
                                                        <span class="avatar">
                                                            <img class="round"
                                                                 src="{{ storage_path("app/public/".$benevole->photoidentite) }}"
                                                                 alt="avatar" height="40" width="40">
                                                        </span>
                                                    </td>
                                                    <td class="large-cell">{{ $benevole->nom }}</td>
                                                    <td class="large-cell">{{ $benevole->prenoms }}</td>
                                                    <td class="large-cell">{{ $benevole->telephone }}</td>
                                                    <td class="large-cell">{{ $benevole->sexe->libelle }}</td>
                                                    <td class="large-cell">{{ $benevole->typepiece->libelle }}</td>
                                                    <td class="large-cell">{{ $benevole->numero_piece }}</td>
                                                    <td class="large-cell">{{ $benevole->lieuresidence->libelle }}</td>
                                                    <td class="large-cell">{{ $benevole->region->libelle }}</td>
                                                    <td class="large-cell">{{ $benevole->departement->libelle }}</td>
                                                    @if($benevole->scolarise == 1)
                                                        <td class="large-cell"><span
                                                                class="badge badge-success">OUI</span></td>
                                                    @else
                                                        <td class="large-cell"><span
                                                                class="badge badge-danger">NON</span></td>
                                                    @endif
                                                    <td class="large-cell">{{ @$benevole->niveauscolaire->libelle }}</td>
                                                    <td class="large-cell">{{ @$benevole->diplome->libelle }}</td>
                                                    <td class="large-cell">{{ $benevole->situationprofessionnel->libelle }}</td>
                                                </tr>
                                            @empty
                                            @endforelse
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                {{ $benevoles->links() }}
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
        //
        $(document).ready(function () {

        });
    </script>
@endsection
