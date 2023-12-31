@if ($benevoles->count() > 0)
    <div class="table-responsive mb-3 text-nowrap">
        <table id="tableBenevole" class="table">
            <thead>
            <tr>
                <th>#</th>
                <th>Nom &Prenom(s)</th>
                <th>Téléphone</th>
                <th>residence</th>
                <th>Région</th>
                <th>Département</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody class="table-border-bottom-0" id="tableBenevoleBody">
            @forelse($benevoles as $key => $benevole)
                <tr 
                <?php if($benevole->state == 2){echo 'class="table-warning"';} ?>
                <?php if($benevole->state == 3){echo 'class="table-success"';} ?>
                >
                    <td class="large-cell">{{ $benevole->code}}</td>
                    <td class="large-cell">{{ strtoupper($benevole->nom) }}</td>
                    <td class="large-cell">{{ $benevole->telephone }}</td>
                    <td class="large-cell">{{ $benevole->lieu_residence }}</td>
                    <td class="large-cell">{{ $benevole->region }}</td>
                    <td class="large-cell">{{ $benevole->departement }}</td>
                    <td class="large-cell">
                        @if($benevole->state == 1)
                        <button type="button" class="btn btn-icon btn-warning waves-effect waves-float waves-light" title="Nommer Chef d'équipe" onclick="changestate({{$benevole->id}},2)">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-inbox"><polyline points="22 12 16 12 14 15 10 15 8 12 2 12"></polyline><path d="M5.45 5.11L2 12v6a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2v-6l-3.45-6.89A2 2 0 0 0 16.76 4H7.24a2 2 0 0 0-1.79 1.11z"></path></svg>
                        </button>
                        <button type="button" class="btn btn-icon btn-success waves-effect waves-float waves-light" title="Nommer superviseur" onclick="changestate({{$benevole->id}},3)">
                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-inbox"><polyline points="22 12 16 12 14 15 10 15 8 12 2 12"></polyline><path d="M5.45 5.11L2 12v6a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2v-6l-3.45-6.89A2 2 0 0 0 16.76 4H7.24a2 2 0 0 0-1.79 1.11z"></path></svg>
                        </button> 
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
    <p>No results found.</p>
@endif
