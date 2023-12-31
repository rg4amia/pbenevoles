@if ($benevoles->count() > 0)
    <div class="table-responsive mb-3 text-nowrap">
        <table id="tableBenevole" class="table">
            <thead>
            <tr>
                <th>#</th>
                <th>Photo</th>
                <th>Date d'inscription</th>
                <th>Nom</th>
                <th>Prenom(s)</th>
                <th>Tél.</th>
                <th>Matricule</th>
                <th>Nationnalité</th>
                <th>Sexe</th>
                <th>T. pièces</th>
                <th>CNI</th>
                <th>residence</th>
                <th>Région</th>
                <th>Département</th>
                <th>Scolarisé</th>
                <th>Handicap ?</th>
                <th>Niveau S.</th>
                <th>Diplôme</th>
                <th>Autre Diplôme</th>
                <th>Situation Pro.</th>
                <th></th>
            </tr>
            </thead>
            <tbody class="table-border-bottom-0" id="tableBenevoleBody">
            @forelse($benevoles as $key => $benevole)
                <tr>
                    <td class="large-cell">{{ $key + 1 }}</td>
                    <td class="large-cell">
                        <span class="avatar">
                            <img class="round" src="{{  Illuminate\Support\Facades\Storage::disk('public')->url($benevole->photoidentite) }}" alt="avatar" height="40" width="40">
                        </span>
                    </td>
                    <td class="large-cell">{{ strtoupper($benevole->created_at->format('d M Y')) }}</td>
                    <td class="large-cell">{{ strtoupper($benevole->nom) }}</td>
                    <td class="large-cell">{{ strtoupper($benevole->prenoms) }}</td>
                    <td class="large-cell">{{ $benevole->telephone }}</td>
                    <td class="large-cell">{{ $benevole->matricule }}</td>
                    <td class="large-cell">{{ strtoupper($benevole->nationalite->libelle) }}</td>
                    <td class="large-cell">{{ $benevole->sexe->libelle }}</td>
                    <td class="large-cell">{{ $benevole->typepiece->libelle }}</td>
                    <td class="large-cell">{{ @$benevole->numero_piece ?: 'AUCUN' }}</td>
                    <td class="large-cell">{{ $benevole->lieuresidence->libelle }}</td>
                    <td class="large-cell">{{ $benevole->region->libelle }}</td>
                    <td class="large-cell">{{ $benevole->departement->libelle }}</td>
                    @if($benevole->scolarise == 1)
                        <td class="large-cell"><span class="badge badge-success">OUI</span></td>
                    @else
                        <td class="large-cell"><span class="badge badge-danger">NON</span></td>
                    @endif
                    @if($benevole->situation_handicap == 1)
                        <td class="large-cell"><span class="badge badge-danger">OUI</span> <br>({{$benevole->preciser_type_handicap}})</td>
                    @else
                        <td class="large-cell"><span class="badge badge-success">NON</span></td>
                    @endif
                    <td class="large-cell">{{ @$benevole->niveauscolaire->libelle ?: 'AUCUN' }}</td>
                    <td class="large-cell">{{ @$benevole->diplome->libelle  ?: 'AUCUN' }}</td>
                    <td class="large-cell">{{ @$benevole->preciser_autre_diplome ?: 'AUCUN' }}</td>
                    <td class="large-cell">{{ strtoupper($benevole->situationprofessionnel->libelle) }}</td>
                    <td class="large-cell">
                        <a class="dt-button buttons-collection buttons-colvis btn btn-relief-success mr-2" tabindex="0" aria-controls="tableBenevole" type="button" aria-haspopup="true" href="{{ route('badgepdf',$benevole->matricule .'.pdf') }}">
                            <span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-download">
                                    <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
                                    <polyline points="7 10 12 15 17 10"></polyline>
                                    <line x1="12" y1="15" x2="12" y2="3"></line>
                                </svg>
                                Badge
                            </span>
                        </a>
                    </td>
                </tr>
            @empty
            @endforelse
            </tbody>
        </table>

    </div>
    <div><button class="btn btn-warning">Total : {{$totalBenevoles}}</button></div>
    <br>
    <div>{{ $benevoles->appends(request()->all())->links() }}</div>
@else
    <p>No results found.</p>
@endif
