
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<link rel="stylesheet" href="/css/index1.css">

 

</head>
<body>
	
	<div class="navbar navbar-inverse" style="background-color: #435d7d;>
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-12">
	  
					<div class="navbar-header">
						<button class="navbar-toggle" data-target="#mobile_menu" data-toggle="collapse"><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
						<a href="javascript:void(0)" class="navbar-brand">Espace Administrateur</a>
					</div>
	  
					<div class="navbar-collapse collapse" id="mobile_menu">
						<ul class="nav navbar-nav">
							
						  <li><a href="javascript:void(0)"  onclick="alert('Vous êtes sur la même page!')">Dashboard</a></li>
						  {{-- <li><a href="{{ Route('prof.index') }}" >Propositions</a></li>
						   <li><a href="{{ Route('prof.demande') }}">Demande</a></li> --}}
							
						</ul>
					   
	  
						<ul class="nav navbar-nav navbar-right">
							<li><a href="#"><span class="glyphicon glyphicon-user"></span> Profile : {{Auth::user()->name}}</a></li>
							<li><a href="#"class="dropdown-toggle" data-toggle="dropdown" ><span class="glyphicon glyphicon-log-in">
							  </span>  <span class="caret"></span>
								 <ul class="dropdown-menu">
									<li><a href="{{ route('logout') }}"onclick="event.preventDefault();
									  document.getElementById('logout-form').submit();" ><span class="glyphicon glyphicon-log-in"></span> Log out </a>
									  <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
										  @csrf  
									  </form>
									
								</ul> 
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	  </div>
	   <!--NAV BAR--->
	   <div id="page-content-wrapper">
        <div class="container-fluid">
          
   
	
	 
	  <div id="wrapper">
		 
		<!-- Sidebar -->
		<!-- Page Content -->
		<div id="page-content-wrapper">
    <div class="container">
		<h1 style="margin-top:30px;margin-bottom: 30px;">Gestion des Utilisateurs</h1>
		<div class="table-responsive">
			<div class="table-wrapper">
				<div class="table-title">
					<div class="row">
						<div class="col-xs-6">
							<h2>Listes des Utilisateurs</b></h2>
						</div>
						<div class="col-xs-6">
							<a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Ajouter Utilisateur</span></a>
							<a href="#ImportUsers" class="btn btn-primary"  data-toggle="modal"><i class="material-icons">&#xE24D;</i> <span>Importer Excel</span></a>	
												
                    </div>						
						</div>
						
					</div>
					
					<input type="text" class="form-control" placeholder="Search Here"id="txtInputTable">
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
				</div>
				
				<table class="table table-striped table-hover">
					<thead>
						<tr>
							 {{-- <th>
								<span class="custom-checkbox">
									<input type="checkbox" id="selectAll">
									<label for="selectAll"></label>
								</span>
							</th>  --}}
							<th>Nom</th>
							<th>Prénom</th>
							{{-- <th>CNE</th>
							<th>APOGEE</th>
							<th>Annee Scolaire</th> --}}
							<th>Etablissement</th>
							<th>Email</th>
							<th>Departement / Filière </th>
							<th>Role</th>
							<th>Actions</th>
						</tr>
					</thead>
					<tbody id="tableDetails" >
						<tr>
                            @foreach($etudiants as $etudiant )
							{{--<td>
								 <span class="custom-checkbox">
									<input type="checkbox" id="checkbox1" name="options[]" value="1">
									<label for="checkbox1"></label>
								</span>
							</td> --}}
							<td>{{ $etudiant->name }}</td>
							<td>{{ $etudiant->prenom }}</td>
							<td>{{ $etudiant->unv }}</td>
							<td>{{ $etudiant->email }}</td>
							<td>{{ $etudiant->dept }}/{{ $etudiant->filiere }}</td>
							
							<td>{{ $etudiant->role }}</td>
							<td>
								<a href="javascript:void(0)" onclick="editEmployee({{ $etudiant->id }})" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
								<a href="javascript:void(0)" onclick="deleteEmployee({{ $etudiant->id }})" class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
                <div class="d-flex justify-content-center"  style="margin-bottom: 100px;">
                    {{ $etudiants->links() }}
                  </div>

			</div>
		</div>        
    </div>
	<!-- add Modal HTML -->
	<div id="addEmployeeModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">	
					<div class="modal-header">						
						<h4 class="modal-title">Ajouter Etudiant</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">
                        <form action="{{ Route('admin.store') }}" method="POST">
                            @csrf
						<div class="form-group">
							<label>Nom</label>
							<input type="text" class="form-control" name="name" required>
						</div>
						<div class="form-group">
							<label>Prenom</label>
							<input type="text" class="form-control" name="prenom" required>
						</div>
                        <div class="form-group">
							<label>CNE</label>
							<input type="text" class="form-control" name="cne" >
						</div>
						<div class="form-group">
							<label>APOGEE</label>
							<input type="text" class="form-control" name="apoge" >
						</div>
						<div class="form-group">
							<label>Annee Scolaire</label>
							<input type="number" class="form-control" name="year" min="2015" max="2025" step="1" >
						</div>
						<div class="form-group">
							<label>Etablissement</label>
                  <select name="unv" id="unv"  class="form-control" >
                    <option value="FS Tetouan ">FS Tetouan</option>
                    <option value="ENSA Tetouan ">ENSA</option>
                </select>
              </div>
						<div class="form-group">
							<label>Email</label>
							<input type="email" class="form-control" name="email" required>
						</div>
						<div class="form-group">
							<label>Departement</label>
                  <select name="dept" id="dept"  class="form-control" >
                    <option value="Informatique">Informatique</option>
                    <option value="Mathematique">Mathematique</option>
                    <option value="Physique">Physique</option>
					<option value="Chimie">Chimie</option>
                </select>
              </div>
						<div class="form-group">
							<label>Filiére</label>
                  <select name="filiere" id="filiere"  class="form-control" >
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
							<label>Role</label>
                  <select name="role" id="role"  class="form-control" required>
					<option value="Etudiant" >Etudiant</option>
					<option value="Enseignant">Enseignant</option>
					<option value="gestionnaire">Gestionnaire</option>
                </select>
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
	<!-- Edit Modal HTML -->
	<div id="editEmployeeModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">						
                    <h4 class="modal-title">Modifier Etudiant</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
            <form id="editEmployeeForm" action="{{ Route('admin.update') }}" method="POST">
                        @csrf
                        @method('PUT')
						<input type="hidden" name="id" id="id">
                    <div class="form-group">
                        <label>Nom</label>
                        <input type="text" class="form-control" id='name' name="name" >
                    </div>
					<div class="form-group">
                        <label>Prenom</label>
                        <input type="text" class="form-control" id='prenom' name="prenom" >
                    </div>
                    <div class="form-group">
                        <label>CNE</label>
                        <input type="text" class="form-control" id='cne' name="cne" >
                    </div>
					<div class="form-group">
						<label>APOGEE</label>
						<input type="text" class="form-control" name="apoge" >
					</div>
					<div class="form-group">
						<label>Annee Scolaire</label>
						<input type="number" class="form-control" name="year" min="2015" max="2025" step="1" >
					</div>
					<div class="form-group">
						<label>Etablissement</label>
			  <select name="unv" id="unv"  class="form-control" >
				<option value="" disabled selected>Select your option</option>
				<option value="FS Tetouan">FS Tetouan</option>
				<option value="ENSA Tetouan">ENSA</option>
			</select>
		  </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" id='email' name="email" >
                    </div>
					<div class="form-group">
						<label>Departement</label>
			  <select name="dept" id="dept"  class="form-control" >
				    <option value="" disabled selected>Select your option</option>
				<option value="Informatique">Informatique</option>
				<option value="Mathematique">Mathematique</option>
				<option value="Physique">Physique</option>
				<option value="Chimie">Chimie</option>
			</select>
		  </div>
                    <div class="form-group">
                        <label>Filiére</label>
              	<select name="filiere" id="filiere"  class="form-control">
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
                        <label>Role</label>
             	 <select name="role" id="role"  class="form-control">
				   <option value="" disabled selected>Select your option</option>
                <option value="Etudiant">Etudiant</option>
                <option value="Enseignant">Enseignant</option>
                <option value="gestionnaire">Gestionnaire</option>
            	</select>
          		</div>			
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                    <input type="submit" value="Modifier" class="btn btn-primary">
                  </div>
			</form>
			</div>
		</div>
	</div>
	<!-- Delete Modal HTML -->
	<div id="deleteEmployeeModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
					<div class="modal-header">						
						<h4 class="modal-title">Supprimer Etudiant</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">					
						<p>Voulez-vous vraiment supprimer cet Etudiant</p>
						<p class="text-warning"><small> Cette action ne peut pas être annulée !</small></p>
					</div>
					<div class="modal-footer">
						<form id="deleteEmployeeForm" method="POST">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
            @csrf
            @method('DELETE')
            <input type="submit" value="Supprimer" class="btn btn-danger">
					</div>
				</form>
			</div>
		</div>
	</div>
	<!--import users -->
	<div id="ImportUsers" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">	
					<div class="modal-header">						
						<h4 class="modal-title">Importer la listes des Etudiants</h4>
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
	
<!-- JavaScript -->
<script>
	function editEmployee(id){
	  $('#editEmployeeModal').modal('toggle');
  
	  $.get('/admin/' + id, function(etudiant){
		$('#name').val(etudiant.name);
		$('#prenom').val(etudiant.prenom);
		$('#cne').val(etudiant.cne);
		$('#apoge').val(etudiant.apoge);
		$('#year').val(etudiant.year);
		$('#unv').val(etudiant.unv);
		$('#email').val(etudiant.email);
		$('#filiere').val(etudiant.filiere);
		$('#role').val(etudiant.role);
		$('#id').val(etudiant.id);
	  });
	}
  
	function deleteEmployee(id){
	  $('#deleteEmployeeModal').modal('toggle');
	  $('#deleteEmployeeForm').attr('action', '/admin/' + id);
	}
	
  $(document).ready(function(){
  $("#menu-toggle").click(function(e){
    e.preventDefault();
    $("#wrapper").toggleClass("menuDisplayed");
      });
      });

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
 
</body>
</html>