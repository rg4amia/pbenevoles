@if ($utilisateurs->count() > 0)
    <div class="table-responsive mb-3 text-nowrap">
        <table id="tableBenevole" class="table">
            <thead>
            <tr>
               
                <th>Nom &Prenom(s)</th>
                <th>Télephone</th>
                <th>mail</th>
                <th>Type utilisateur</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody class="table-border-bottom-0" id="tableBenevoleBody">
            @forelse($utilisateurs as $key => $utilisateur)
                <tr>
                    <td class="large-cell">{{ strtoupper($utilisateur->name) }}</td>
                    <td class="large-cell">{{ $utilisateur->telephone }}</td>
                    <td class="large-cell">{{ $utilisateur->mail }}</td>
                    <td class="large-cell">{{ $utilisateur->type}}</td>
                    <td class="large-cell"></td>
                </tr>
            @empty
            @endforelse
            </tbody>
        </table>

    </div>
    <div><button class="btn btn-warning">Total : {{$totalutilisateur}}</button></div>
    <br>
    <div>{{ $utilisateurs->appends(request()->all())->links() }}</div>
@else
    <p>No results found.</p>
@endif
