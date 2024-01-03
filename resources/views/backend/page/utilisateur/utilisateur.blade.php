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
                    <td class="large-cell">@php
                       if($utilisateur->type == 1){echo 'Chef d\'équipe';}
                       elseif($utilisateur->type == 2){echo 'Superviseur';}
                       elseif($utilisateur->type == 3){echo 'Coordinateur';}
                       elseif($utilisateur->type == 4){echo 'Directeur départemental';}
                       elseif($utilisateur->type == 5){echo 'Directeur régional';}
                       else{echo 'Admin';}
                    @endphp</td>
                    <td class="large-cell">
                        @if($utilisateur->type == 1)
                        <a href="{{route('utilisateur.affectation.benevole',$utilisateur->id)}}" type="button" class="btn btn-warning waves-effect waves-float waves-light" title="Affecter bénévoles">
                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-grid"><rect x="3" y="3" width="7" height="7"></rect><rect x="14" y="3" width="7" height="7"></rect><rect x="14" y="14" width="7" height="7"></rect><rect x="3" y="14" width="7" height="7"></rect></svg>
                            <span>Bénévoles</span>
                        </a>
                        @endif
                        @if($utilisateur->type == 2)
                        <a href="{{route('utilisateur.affectation.chefequipe',$utilisateur->id)}}" type="button" class="btn btn-success waves-effect waves-float waves-light" title="Affecter Chef d'équipe">
                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-grid"><rect x="3" y="3" width="7" height="7"></rect><rect x="14" y="3" width="7" height="7"></rect><rect x="14" y="14" width="7" height="7"></rect><rect x="3" y="14" width="7" height="7"></rect></svg>
                            <span>Chef d'équipe</span>
                        </a>
                        @endif
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
    <p>No results found.</p>
@endif
