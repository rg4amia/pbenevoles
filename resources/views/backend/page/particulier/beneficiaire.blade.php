@if ($benevoles->count() > 0)
    <div class="table-responsive mb-3 text-nowrap">
        <table id="tableBenevole" class="table">
            <thead>
            <tr>
                <th>#</th>
                <!-- <th>Photo</th>
                <th>Date d'inscription</th> -->
                <th>Nom &Prenom(s)</th>
                <th>Tél.</th>
                <!-- <th>Matricule</th>
                <th>Nationnalité</th>
                <th>Sexe</th>
                <th>T. pièces</th>
                <th>CNI</th> -->
                <th>residence</th>
                <th>Région</th>
                <!-- <th>Département</th>
                <th>Scolarisé</th>
                <th>Handicap ?</th>
                <th>Niveau S.</th>
                <th>Diplôme</th>
                <th>Autre Diplôme</th>
                <th>Situation Pro.</th> -->
                <th></th>
            </tr>
            </thead>
            <tbody class="table-border-bottom-0" id="tableBenevoleBody">
            @forelse($benevoles as $key => $benevole)
                <tr>
                    <td class="large-cell">{{ $benevole->code}}</td>
                    <td class="large-cell">{{ strtoupper($benevole->nom) }}</td>
                    <td class="large-cell">{{ $benevole->telephone }}</td>
                    <td class="large-cell">{{ $benevole->lieu_residence }}</td>
                    <td class="large-cell">{{ $benevole->region }}</td>
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
