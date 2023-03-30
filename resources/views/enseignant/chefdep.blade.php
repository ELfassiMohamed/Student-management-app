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
 <link rel="stylesheet" href="css/table.css"> 

<link rel="stylesheet" href="css/navbar.css">


</head>
<body>
   {{-- <nav class="navbar navbar-light" style="background-color: #e3f2fd;">
		<div class="container-fluid">
		  <div class="navbar-header">
			<a class="navbar-brand" >Chef Departement</a>
		  </div>
		  <ul class="nav navbar-nav">
			<li class="active">
				<a class="nav-link" href="{{ route('logout') }}"onclick="event.preventDefault();
							document.getElementById('logout-form').submit();">
												<i class="material-icons">&#xe9ba;</i>{{ __('Logout') }}
											</a>

											<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
												@csrf  
											</form>
					</li>	
		  </ul>
		</div>
	  </nav>   --}}
	 	<!----- nav bar -------->
		 <div class="navbar navbar-inverse" style="background-color: #435d7d;>
			<div class="container-fluid">
				<div class="row">
					<div class="col-lg-12">
	
						<div class="navbar-header">
							<button class="navbar-toggle" data-target="#mobile_menu" data-toggle="collapse"><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
							<a href="#" class="navbar-brand">Espace Gestionnaire</a>
						</div>
	
						<div class="navbar-collapse collapse" id="mobile_menu">
							<ul class="nav navbar-nav">
								
								<li><a href="#">Utilisatuers</a></li>
								<li><a href="{{ Route('enseignant.props') }}">Propositions</a></li>
								<!-- <li><a href="#">Gallery</a></li>
								<li><a href="#">Contact Us</a></li> -->
							</ul>
							<!-- <ul class="nav navbar-nav">
								<li>
									<form action="" class="navbar-form">
										<div class="form-group">
											<div class="input-group">
												<input type="search" name="search" id="" placeholder="Search Anything Here..." class="form-control">
												<span class="input-group-addon"><span class="glyphicon glyphicon-search"></span></span>
											</div>
										</div>
									</form>
								</li>
							</ul> -->
	
							<ul class="nav navbar-nav navbar-right">
								<li><a href="{{Route('enseignant.editer')}}"><span class="glyphicon glyphicon-user"></span>Profile : {{Auth::user()->name}}</a></li>
								<li><a href="{{ route('logout') }}"onclick="event.preventDefault();
								document.getElementById('logout-form').submit();" ><span class="glyphicon glyphicon-log-in"></span> Log out </a>
								<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
									@csrf  
								</form>
									<!-- <ul class="dropdown-menu">
										<li><a href="#">Log out</a></li>
										
									</ul> -->
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!----- nav bar -------->
    
    </div> 
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
							<a href="#ImportUsers" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Importer la liste</span></a>
							<a href="#ExporttUsers" class="btn btn-primary"  data-toggle="modal"><i class="material-icons">&#xE24D;</i> <span>Télécharger la liste</span></a>	
												
                    </div>						
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
							<th>Département / Filiere</th>
							<th>Email</th>
							<th>Role</th>
						</tr>
					</thead>
					<tbody>
						<tr>
                            @foreach($users as $user )
							{{--<td>
								 <span class="custom-checkbox">
									<input type="checkbox" id="checkbox1" name="options[]" value="1">
									<label for="checkbox1"></label>
								</span>
							</td> --}}
							<td>{{ $user->name }}</td>
							<td>{{ $user->prenom }}</td>
							<td>{{ $user->dept }} / {{ $user->filiere }}</td>
							<td>{{ $user->email }}</td>
							<td>{{ $user->role }}</td>
						</tr>
						@endforeach
					</tbody>
				</table>
        <div class="d-flex justify-content-center"  style="margin-bottom: 100px;">
                    {{ $users->links() }}
          </div>

			</div>
		</div>
  </div>
    
    <!--Exportt users -->
	<div id="ExporttUsers" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">	
					<div class="modal-body">
						<form action="{{ route('export') }}" method="GET" enctype="multipart/form-data">
							@csrf
						<label>Télécharger le fichier.</label>	
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
						<input type="submit"  name="Télécharger" value="Télécharger" class="btn btn-primary">
					  </div>
					</form>
			</div>
		</div>
	</div>

	<div id="ImportUsers" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">	
				<div class="modal-header">						
				  <h4 class="modal-title">Importer la listesPHP</h4>
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
           

<script>


</script>
</body>
</html>
