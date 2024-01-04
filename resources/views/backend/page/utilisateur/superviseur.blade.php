@if ($benevoles->count() > 0)
    <div class="table-responsive mb-3 text-nowrap">
        <table id="tableBenevole" class="table">
            <thead>
            <tr>
                <!-- <th>#</th> -->
                <th><input type="checkbox" id="select-all"></th>
                <th>Matricule</th>
                <th>Nom &Prenom(s)</th>
                <th>Téléphone</th>
                <th>residence</th>
                <th>Région</th>
                <th>Département</th>
            </tr>
            </thead>
            <tbody class="table-border-bottom-0" id="tableBenevoleBody">
            @forelse($benevoles as $key => $benevole)
                <tr>
                    <td><input type="checkbox" class="select-row" value="{{$benevole->id}}"/></td>
                    <td class="large-cell">{{ $benevole->matricule}}</td>
                    <td class="large-cell">{{ strtoupper($benevole->nom) }}</td>
                    <td class="large-cell">{{ $benevole->telephone }}</td>
                    <td class="large-cell">{{ $benevole->lieu_residence }}</td>
                    <td class="large-cell">{{ $benevole->region }}</td>
                    <td class="large-cell">{{ $benevole->departement }}</td>
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
