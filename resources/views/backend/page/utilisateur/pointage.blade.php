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
                    <td class="large-cell">{{ $pointage->date }} {{ $pointage->periode }}</td>
                    <td class="large-cell">{{ App\Helpers\Helper::getInstanceName('users','id',$pointage->author_id,'name') }}</td>
                    <td class="large-cell">
                        <a class="btn btn-warning" href="{{route('pointage.remplir',$pointage->id)}}">Détail</a>
                    
                    @if(Auth::user()->type==2 ||Auth::user()->type==3 || Auth::user()->type==4 || Auth::user()->type==5 || Auth::user()->type==6) 
                        <button type="button" class="btn btn-info" onclick="showFileModal({{$pointage->id}})">Fiche</button> 
                    @endif
                        @if($pointage->file_pointage)
                        <a class="btn btn-success" href="{{  \Illuminate\Support\Facades\Storage::disk('public')->url($pointage->file_pointage)  }}">Télécharger fichier</a>
                        @endif
                    </td>
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
