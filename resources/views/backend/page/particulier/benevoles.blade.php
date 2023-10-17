@if ($benevoles->count() > 0)
    <div class="table-responsive mb-3 text-nowrap">
        <table id="tableBenevole" class="table">
            <thead>
            <tr>
                <th>#</th>
                <th>Photo</th>
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
                <th>Niveau S.</th>
                <th>Diplôme</th>
                <th>Autre Diplôme</th>
                <th>Situation Pro.</th>
            </tr>
            </thead>
            <tbody class="table-border-bottom-0" id="tableBenevoleBody">
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
                    <td class="large-cell">{{ strtoupper($benevole->nom) }}</td>
                    <td class="large-cell">{{ strtoupper($benevole->prenoms) }}</td>
                    <td class="large-cell">{{ $benevole->telephone }}</td>
                    <td class="large-cell">{{ $benevole->matricule }}</td>
                    <td class="large-cell">{{ strtoupper($benevole->nationalite->libelle) }}</td>
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
                    <td class="large-cell">{{ @$benevole->preciser_autre_diplome }}</td>
                    <td class="large-cell">{{ strtoupper($benevole->situationprofessionnel->libelle) }}</td>
                </tr>
            @empty
            @endforelse
            </tbody>
        </table>
    </div>
    {{ $benevoles->appends(request()->all())->links() }}
@else
    <p>No results found.</p>
@endif
