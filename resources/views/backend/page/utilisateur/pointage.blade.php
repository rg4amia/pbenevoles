@if ($pointages->count() > 0)
    <div class="table-responsive mb-3 text-nowrap">
        <table id="tableBenevole" class="table">
            <thead>
            <tr>
               
                <th>Date de création</th>
                <th>Date du pointage</th>
                <th>Auteur</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody class="table-border-bottom-0" id="tableBenevoleBody">
            @forelse($pointages as $key => $pointage)
                <tr>
                    <td class="large-cell">{{ $pointage->created_at }}</td>
                    <td class="large-cell">{{ $pointage->date }}</td>
                    <td class="large-cell">{{ strtoupper($pointage->author_id) }}</td>
                    <td class="large-cell"></td>
                </tr>
            @empty
            @endforelse
            </tbody>
        </table>

    </div>
    <div><button class="btn btn-warning">Total : {{$totalpointage}}</button></div>
    <br>
    <div>{{ $pointages->appends(request()->all())->links() }}</div>
@else
    <p>Aucun résultat.</p>
@endif
