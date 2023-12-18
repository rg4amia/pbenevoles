@if ($benevoles->count() > 0)
    <div class="table-responsive mb-3 text-nowrap">
        <table id="tableBenevole" class="table">
            <thead>
            <tr>
                <th>#</th>
                <th>Date d'enregistrement</th>
                <th>Nom</th>
                <th>Tél.</th>
                <th>Type reclamation</th>
                <th>Nom correct</th>
                <th>Lieu de residence</th>
                <th>Autre reclamation</th>
                <th></th>
            </tr>
            </thead>
            <tbody class="table-border-bottom-0" id="tableBenevoleBody">
            @forelse($benevoles as $key => $benevole)
                <tr>
                    <td class="large-cell">{{ $key + 1 }}</td>
                    <td class="large-cell">{{ strtoupper($benevole->created_at->format('d M Y')) }}</td>
                    <td class="large-cell">{{ strtoupper($benevole->nom) }}</td>
                    <td class="large-cell">{{ $benevole->telephone }}</td>
                    @if($benevole->type_reclamation == 1)
                    <td class="large-cell">Erreur sur le nom</td>
                    @elseif($benevole->type_reclamation == 2)
                    <td class="large-cell">Erreur sur le lieu de residence</td>
                    @else
                    <td class="large-cell">Autre</td>
                    @endif    
                    <td class="large-cell">{{ @strtoupper($benevole->nom_correct) }}</td>
                    <td class="large-cell">{{ @$benevole->lieuresidence->libelle }}</td>
                    <td class="large-cell">{{ @$benevole->autre }}</td>
                    <td class="large-cell"></td>
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
