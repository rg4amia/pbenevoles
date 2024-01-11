@if ($benevoles->count() > 0)
    <div class="table-responsive mb-3 text-nowrap">
        <table id="tableBenevole" class="table">
            <thead>
            <tr>
                <!-- <th>#</th> -->
                <th></th>
                <th>Matricule</th>
                <th>Nom &Prenom(s)</th>
                <th>Téléphone</th>
                <th>residence</th>
                <th>Région</th>
                <th>Département</th>
                <th>Superviseur</th>
            </tr>
            </thead>
            <tbody class="table-border-bottom-0" id="tableBenevoleBody">
            @forelse($benevoles as $key => $benevole)
                <tr
                <?php if($benevole->is_affected == 2){echo 'class="table-success"';} ?>
                >
                    <td>@if($benevole->is_affected == 1)<input type="checkbox" class="select-row" value="{{$benevole->id}}"/>@endif</td>
                    <td class="large-cell">{{ $benevole->matricule}}</td>
                    <td class="large-cell">{{ strtoupper($benevole->nom) }}</td>
                    <td class="large-cell">{{ $benevole->telephone }}</td>
                    <td class="large-cell">{{ $benevole->lieu_residence }}</td>
                    <td class="large-cell">{{ $benevole->region }}</td>
                    <td class="large-cell">{{ $benevole->departement }}</td>
                    <td class="large-cell">{{ App\Helpers\Helper::getInstanceName('users','id',$benevole->chefequipe_id,'name') }}</td>
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
