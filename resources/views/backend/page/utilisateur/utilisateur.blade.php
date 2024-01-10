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
                    <td class="large-cell">{{ $utilisateur->email }}</td>
                    <td class="large-cell">@php
                       if($utilisateur->type == 1){echo 'Chef d\'équipe';}
                       elseif($utilisateur->type == 2){echo 'Superviseur';}
                       elseif($utilisateur->type == 3){echo 'Coordinateur';}
                       elseif($utilisateur->type == 4){echo 'Directeur départemental';}
                       elseif($utilisateur->type == 5){echo 'Directeur régional';}
                       else{echo 'Admin';}
                    @endphp</td>
                    <td class="large-cell">
                    
                    </td>
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
    <p>Aucun résultat.</p>
@endif
