@if ($benevoles->count() > 0)
    <div class="table-responsive mb-3 text-nowrap">
        <table id="tableBenevole" class="table">
            <thead>
            <tr>
                <th>#</th>
                <th>Matricule</th>
                <th>Nom</th>
                <th>Numero enregistrement</th>
                <th>Numero création</th>
                <th>Statut juridique</th>
                <th>Région</th>
                <th>Département</th>
                <th>Nom du repondant</th>
                <th>Contact</th>
                <th>Fonction</th>
                <th></th>
            </tr>
            </thead>
            <tbody class="table-border-bottom-0" id="tableBenevoleBody">
            @forelse($benevoles as $key => $benevole)
                <tr>
                    <td class="large-cell">{{ $key + 1 }}</td>
                    <td class="large-cell">{{ strtoupper($benevole->matricule) }}</td>
                    <td class="large-cell">{{ strtoupper($benevole->nom) }}</td>
                    <td class="large-cell">{{ $benevole->numero_enregistrement }}</td>
                    <td class="large-cell">{{ $benevole->numero_creation }}</td>
                    <td class="large-cell">{{ $benevole->statut_juridique }}</td>
                    <td class="large-cell">{{ $benevole->region->libelle }}</td>
                    <td class="large-cell">{{ $benevole->departement->libelle }}</td>
                    <td class="large-cell">{{ $benevole->nom_repondant.' '.$benevole->prenoms_repondant }}</td>
                    <td class="large-cell">{{ $benevole->telephone_repondant }}</td>
                    <td class="large-cell">{{ $benevole->fonction_repondant_org }}</td>
                    <td class="large-cell"></td>

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
