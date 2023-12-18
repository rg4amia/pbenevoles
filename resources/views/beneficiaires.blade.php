<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <title>Tableau Bootstrap avec Bouton Réclamation</title>
</head>
<body>


<div id="loader_form">
    <div data-loader="circle-side-2"></div>
</div>
<!-- /Loader_form -->

<header>
    <!-- <a id="menu-button-mobile" class="cmn-toggle-switch cmn-toggle-switch__htx" href="javascript:void(0);"><span>Menu mobile</span></a>
    <nav class="main_nav">
        <ul class="nav nav-tabs">
            <li><a href="#tab_1" data-bs-toggle="tab" class="active show">Request a quote</a></li>
            <li><a href="#tab_2" data-bs-toggle="tab">About</a></li>
            <li><a href="#tab_3" data-bs-toggle="tab">Contact</a></li>
        </ul>
    </nav> -->
</header><!-- /header -->

<div id="main_container" class="visible">
    <div id="header_in">
        <div id="logo_in"><img src="{{ asset('assets/img/logodv.png') }}" width="100" height="100" data-retina="true" alt="Quote"></div>
    </div>
   
   <div class="container"><!-- /content -->
   <h2 style="color:#ff8019;">Liste des bénéficiaires</h2>
  <div class="table-responsive">
    <table class="table table-bordered">
      <thead>
        <tr>
          <th>#</th>
          <th>Nom & prénoms</th>
          <th>Lieu de résidence</th>
          <th>Région de résidence</th>
        </tr>
      </thead>
      <tbody>
        @php $i = 1; @endphp
        @foreach($benevoles as $benevole)
        <tr>
          <td>{{$i}}</td>
          <td>{{$benevole->nom.' '.$benevole->prenoms}}</td>
          <td>{{$benevole->lieu_naissance_id}}</td>
          <td>{{$benevole->lieu_residence_id}}</td>
        </tr>
       @php $i++; @endphp
       @endforeach
        <!-- Ajoutez autant de lignes que nécessaire -->
      </tbody>
    </table>
  </div>
  
  <!-- Pagination -->
  <nav aria-label="Page navigation example">
    {{ $benevoles->links() }}
  </nav>
  
  <!-- Bouton flottant Réclamation -->
  <button class="col-sm-2 btn btn-primary btn-sm btn-block rounded position-fixed" style="bottom: 350px; right: 20px;" onclick="afficherModal()">
    Réclamation
  </button>
  
  
</div>

</div><!-- /main_container -->

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

<script>
  function afficherModal() {
    $('#reclamationModal').modal('show');
  }
</script>

</body>
</html>
