<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Gestion des etudiants</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<link rel="stylesheet" href="/css/profile.css">

<link rel="stylesheet" href="/css/table.css">


</head>
<body>
  <div class="navbar navbar-inverse" style="background-color: #435d7d;>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">

                <div class="navbar-header">
                    <button class="navbar-toggle" data-target="#mobile_menu" data-toggle="collapse"><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
                    <a href="javascript:void(0)" class="navbar-brand">Espace Etudiant</a>
                </div>

                <div class="navbar-collapse collapse" id="mobile_menu">
                    <ul class="nav navbar-nav">
                        
                        <li><a href="{{ Route('home') }}">Dashboard</a></li>
                         <li><a  href="javascript:void(0)"  onclick="alert('Vous êtes sur la même page!')" >Propositions</a></li>
                         <li><a href="{{Route('student.notification')}}">Mes Demandes</a></li>
                        
                    </ul>
                    
                </div>
            </div>
        </div>
    </div>

  <div class="col-lg-5 col-md-5 col-sm-5 col-md-offset-3">
    <div class="contact_form">
      <div id="form-messages1"></div>
      @foreach($errors->all(':message') as $message)
        <div id="form-messages" class="alert alert-danger" role="alert">
          {{ $message }}
        </div>
      @endforeach()
      
  @if(session('success'))
  <div class="alert alert-info">
  {{ session('success') }}
  </div>
  @endif
      
  </div>
  </div>
 
    
    
    
    <div class="box">
 <!------Message---->
 {{-- <div class="col-lg-5 col-md-5 col-sm-5 col-md-offset-3">
  <div class="contact_form">
    <div id="form-messages1"></div>
    @foreach($errors->all(':message') as $message)
      <div id="form-messages" class="alert alert-danger" role="alert">
        {{ $message }}
      </div>
    @endforeach()
    
@if(session('success'))
<div class="alert alert-info">
{{ session('success') }}
</div>
@endif
    
</div>
</div> --}}
<div class="container">
  <h1 style="margin-top:30px;margin-bottom: 30px;">Gestion des Propositions</h1>
<div class="table-responsive">
  <div class="table-wrapper">
    <div class="table-title">
      <div class="row">
        <div class="col-xs-6">
          <h2>Listes des Propositions</b></h2>
        </div>
       
                    
        </div>
      </div>
      <input type="text" class="form-control" placeholder="Search Here"id="txtInputTable">
      
    </div>
    <table class="table table-striped table-hover">
      <thead>
        <tr>  
          <th>Titre</th>
          <th>Créer par</th>
          <th>Cycle</th>
          <th>Département/Filiere</th>
          {{-- <th>Filiere</th>					 --}}
          <th>Type Proposition</th>
          <th>Description</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody id="tableDetails">
        <tr>
            @foreach($props as $value )
          
            @if($value->statut==1  )
          <td>{{ $value->titre }}</td>
          <td>{{ $value->users->name }} {{  $value->users->prenom }}</td>
          <td>{{ $value->cycle }}</td>
          <td>{{ $value->depart }},{{ $value->filiere }}</td>
          <td>{{ $value->type_props }}</td>
          <td>{{ $value->description }}</td>
          <td>
            <a href="#Dmander" class="btn btn-success"  data-toggle="modal"><i class="#" aria-hidden="true"></i> <span>Demander Encadremant</span></a> 
          </td>
          @endif
        </tr>
        
        @endforeach
      </tbody>
    </table>
    
    @foreach($props as $value)
      @if($value->statut==0)
      <div class="col-xs-15" center>
        <center><h2>Autres propositions seront affichées plus tard</h2></center>
      </div>
      @endif
      @endforeach
    </div>
    {{-- <div class="d-flex justify-content-center"  style="margin-bottom: 100px;">
                {{ $users->links() }}
      </div> --}}
</div>
      
           
    </div>

<!-- Proposition -->


<div id="Dmander" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">	
        <div class="modal-header">						
          <h4 class="modal-title">Demander Encadremant</h4>
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        </div>
        <div class="modal-body">
         <form action="{{ Route('stdprop.store_demande') }}" method="POST">
                          @csrf
            <input type="hidden" name="etat"  value="1">
            <input type="hidden" name="etat_prop"  value="1">
            <div class="form-group">
              <label>Nom et Prenom</label>
              <input type="text" class="form-control"  name="etudiant" required>
            </div>
            <div class="form-group">
            <label>Apogee</label>
              <input type="text" class="form-control"  name="apoge" required>
            </div>
            
            <div class="form-group">
            <label>E-mail</label>
            <input type="email" class="form-control"  name="email" required>
          </div> 
          <div class="form-group">
            <label>Proposition</label>
            <input type="text" class="form-control"  name="titre_demande" required>
          </div>
          
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
          <input type="submit" value="Demander" class="btn btn-primary">
        </div>
      </form>
    </div>
  </div>
</div>
</div>

 <!-- Proposition -->


<div id="suivi" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">	
        <div class="modal-header">						
          <h4 class="modal-title">suivi votre demande</h4>
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label>Demande </label>
             
            </div>
       
    </div>
  </div>
</div>
</div>




<script>

$(document).ready(function () {
       
       $("#txtInputTable").on("keyup", function () {
         var value = $(this).val().toLowerCase();     
         $("#tableDetails tr").filter(function () {
           $(this).toggle($(this).text()
           .toLowerCase().indexOf(value) > -1)
         });
       });
     });
</script>
<style>
p{
    font-size:15px;
}

.box{
    padding:60px 0px;
}

.box-part{
    background:#FFF;
    border-radius:0px;
    padding:60px 10px;
    margin:30px 0px;
}
.text{
    margin:20px 0px;
}
</style>
</body>
</html>
