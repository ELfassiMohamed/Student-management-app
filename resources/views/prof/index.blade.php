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
                    <a href="javascript:void(0)" class="navbar-brand">Espace Gestionnaire</a>
                </div>

                <div class="navbar-collapse collapse" id="mobile_menu">
                    <ul class="nav navbar-nav">
                        
                      <li><a href="{{ Route('prof.dashboard') }}">Dashboard</a></li>
                      <li><a href="javascript:void(0)"  onclick="alert('Vous êtes sur la même page!')">Propositions</a></li>
                       <li><a href="{{ Route('prof.demande') }}">Demande</a></li>
                    
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
  
    <div id="wrapper">
      <!-- Sidebar -->
     
      
      <!-- Page Content -->
      <div id="page-content-wrapper">
        <div class="container-fluid">
          
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
    <div class="container">
    <h1 style="margin-top:30px;margin-bottom: 30px;">Gestion des Propositions</h1>
		<div class="table-responsive">
			<div class="table-wrapper">
				<div class="table-title">
					<div class="row">
						<div class="col-xs-6">
							<h2>Listes des Propositions</b></h2>
						</div>
						<div class="col-xs-6">
							<a href="#addProps" class="btn btn-success"  data-toggle="modal"><i class="fa fa-plus" aria-hidden="true"></i> <span>Propositions</span></a>
              <a href="#ImportUsers" class="btn btn-primary"  data-toggle="modal"><i class="material-icons">&#xE24D;</i> <span>Importer Excel</span></a>						
              </div>						
						</div>
					</div>
          
				</div>
				<table class="table table-striped table-hover">
					<thead>
						<tr>
							<th>Titre</th>
							<th>Cycle</th>
              <th>Departement/Filiere</th>					
              <th>Type Proposition</th>
              <th> Description</th>
              <th>Action</th>
						</tr>
					</thead>
					<tbody>
						<tr>
              @foreach($props as $value )
							<td>{{ $value->titre }}</td>
							<td>{{ $value->cycle }}</td>
              <td>{{ $value->depart }},{{ $value->filiere }}</td>
              <td>{{ $value->type_props }}</td>
              <td>{{ $value->description }}</td>
							<td>
								<a href="#deleteProps" onclick="deleteProps({{ $value->id }})" class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
                <a href="{{ url('edit-proposition/'.$value->id) }}"   class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
                
              </td>
						</tr>
            @endforeach
					</tbody>
				</table>
        <div class="d-flex justify-content-center"  style="margin-bottom: 100px;">
                   
          </div>

			</div>
		</div>
  </div>
    
    <!--Ajouter Proposition -->
	<div id="addProps" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">	
					<div class="modal-header">						
						<h4 class="modal-title">Ajouter Proposition</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">
                        <form action="{{ Route('prof.store') }}" method="POST">
                            @csrf
						<div class="form-group">
              <input type="hidden" name="statut" value="0">
							<label>Titre</label>
							<input type="text" class="form-control"  name="titre" required>
						</div>
            
						<div class="form-group">
							<label for="cycle">Cycle</label>
							<select name="cycle" id="cycle"  class="form-control" >
                  <option value="" disabled selected>Select your option</option>
                  <option value="Licences">Licences</option>
                  <option value="Masters" >Masters</option>
              </select>
						</div>
            <div class="form-group">
							<label>Departement</label>
							<select  name="depart" id="depart"  class="form-control" >
                  <option value="" disabled selected>Select your option</option>
                  <option value="Informatique">Informatique</option>
                  <option value="Mathematique">Mathematique</option>
                  <option value="Physique">Physique</option>
                  <option value="Chimie">Chimie</option>
                  
              </select>
						</div>
          
              <div class="form-group" >
							<label for="filiere" >Filiere</label>
							<select  name="filiere" id="filiere"  class="form-control" >
                  <option value="" disabled selected>Select your option</option>
                  <option value="SMI">SMI</option>
                  <option value="SMA">SMA</option>
                  <option value="SMP">SMP</option>
                  <option value="SMC">SMC</option>
                  <option value="SVI">SVI</option>
                  <option value="SVT">SVT</option>
                  
              </select>
						</div>
          
						<div class="form-group">
							<label>Type Prpositions</label>
                  <select name="type_props" id="type_props"  class="form-control" >
                    <option value="" disabled selected>Select your option</option>
                    <option value="Monome">Monome</option>
                     <option value="Binome">Binome</option>
                </select>
              </div>

						<div class="form-group">
							<label>Description</label>
                             
                            <textarea class="form-control" name="description"rows="3"></textarea>
                       </div>
							
					</div>
					<div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                        <input type="submit" value="Ajouter" class="btn btn-primary">
                      </div>
				</form>
			</div>
		</div>
	</div>
           
<!------------------------->

<div id="ImportUsers" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">	
        <div class="modal-header">						
          <h4 class="modal-title">Importer la listes des sujets</h4>
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        </div>
        <div class="modal-body">
          <form action="" method="POST" enctype="multipart/form-data">
            @csrf
          <label>Sélectionnez Fichier à télécharger.</label>	
          <input type="file" name="select_file" />
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
          <input type="submit"  name="upload" value="Upload" class="btn btn-primary">
          </div>
        </form>
    </div>
  </div>
</div>


<!-- Delete Modal HTML -->
<div id="deletePropsModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
                <div class="modal-header">						
                    <h4 class="modal-title">Supprimer Propositions</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">					
                    <p>Voulez-vous vraiment supprimer cet Propositions</p>
                    <p class="text-warning"><small> Cette action ne peut pas être annulée !</small></p>
                </div>
                <div class="modal-footer">
                    <form id="deletePropsForm" method="POST">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
        @csrf
        @method('DELETE')
        <input type="submit" value="Supprimer" class="btn btn-danger">
                </div>
            </form>
        </div>
    </div>
</div>


<script>

	function deleteProps(id){
	  $('#deletePropsModal').modal('toggle');
	  $('#deletePropsForm').attr('action', '/prof/' + id);
	}
       
</script>
</body>
</html>
