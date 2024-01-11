@if ($benevoles->count() > 0)
    <div class="table-responsive mb-3 text-nowrap">
        <table id="tableBenevole" class="table">
            <thead>
            <tr>
                <th>#</th>
                <th>Date d'enregistrement</th>
                <th>Nom</th>
                <th>Tél.</th>
                <th>Lieu de résidence a l'inscription</th>
                <th>Type reclamation</th>
                <th>Nom correct</th>
                <th>Lieu de residence correct</th>
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
                    <td class="large-cell">{{ @$benevole->residenceInscrit->libelle }}</td>
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
                    <td class="large-cell">
                        @if($benevole->state == 1)
                        <button class="btn btn-warning" onclick="changestate({{$benevole->id}},2)">en attente</button>
                        @elseif($benevole->state == 2)
                        <button class="btn btn-success" onclick="changestate({{$benevole->id}},1)">Traité</button>
                        @elseif($benevole->state == 3)
                        <button class="btn btn-danger" onclick="changestate({{$benevole->id}},1)">Réjété</button>
                        @endif
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
    <p>Aucun résultat.</p>
@endif
