@extends('backend.panels.main')
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
                            <h4 class="card-title">LISTE DES FICHES EN ATTENDE DE VERIFICATION</h4>
                            <p class="card-description">
                                POUR L’ELABORATION DE LA CONVENTION PAE | C2D
                            </p>
                            <div class="row">
                                <div class="col-lg-12 grid-margin stretch-card">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Nom Prenom(s)</th>
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
                                                <th></th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                                @forelse($benevoles as $key => $benevole)
                                                    <tr>{{ $key }}</tr>
                                                    <tr>{{ $benevole->nom . ' ' . $benevole->prenoms }}</tr>
                                                    <tr>{{ $benevole->telephone }}</tr>
                                                    <tr>{{ $benevole->sexe->libelle }}</tr>
                                                    <tr>{{ $benevole->typepiece->libelle }}</tr>
                                                    <tr>{{ $benevole->numero_piece }}</tr>
                                                    <tr>{{ $benevole->lieuresidence->libelle }}</tr>
                                                    <tr>{{ $benevole->region->libelle }}</tr>
                                                    <tr>{{ $benevole->departement->libelle }}</tr>
                                                    @if($benevole->scolarise)
                                                        <tr> <span class="badge badge-success">OUI</span> </tr>
                                                    @else
                                                        <tr> <span class="badge badge-secondary">NON</span> </tr>
                                                    @endif
                                                    <tr>{{ $benevole->niveauscolaire->libelle }}</tr>
                                                    <tr>{{ $benevole->diplome->libelle }}</tr>
                                                    <tr>{{ $benevole->situationprofessionnel->libelle }}</tr>
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
