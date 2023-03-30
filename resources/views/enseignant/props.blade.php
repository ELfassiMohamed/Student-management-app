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
<link rel="stylesheet" href="css/sidebar.css">

</head>
<body>
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
							
							<li><a href="{{ Route('enseignant.chefdep') }}">Utilisatuers</a></li>
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
							<li><a href="#"><span class="glyphicon glyphicon-user"></span>Profile : {{Auth::user()->name}}</a></li>
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
   
    <div id="wrapper">
     
      <!-- Page Content -->
      <div id="page-content-wrapper">
        <div class="container-fluid">
          <div class="row">
           
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
							</th>   --}}
							
							<th>Titre</th>
							<th>Créer par</th>
							<th>Cycle</th>
							<th>Filiere</th>					
                            {{-- <th>Type Proposition</th>
                            <th>Description</th> --}}
							<th>Actions</th>
                            {{-- <th>Action</th> --}}
						</tr>
					</thead>
					<tbody>
						<tr>
                            @foreach($props as $value )
							{{-- <td>
								<span class="custom-checkbox">
								   <input type="checkbox" id="checkbox1" name="options[]" value="1">
								   <label for="checkbox1"></label>
							   </span>
						   </td> --}}
						   
							<td>{{ $value->titre }}</td>
							<td>{{ $value->users->name }} {{  $value->users->prenom }}</td>
							<td>{{ $value->cycle }}</td>
							<td>{{ $value->filiere }}</td>
                            {{-- <td>{{ $value->type_props }}</td>
                            <td>{{ $value->description }}</td> --}}
                            <td>
								@if($value->statut==0)
								<a href="{{ url('set-visible/'.$value->id) }}" class ="btn btn-sm btn-warning" >non Visible </a>
								@endif
								@if ($value->statut==1)
								<a href="{{ url('set-visible/'.$value->id) }}" class ="btn btn-sm btn-success" >visible </a>
								@endif  
								
                            </td>
							
						</tr>
						@endforeach
					</tbody>
				</table>
        {{-- <div class="d-flex justify-content-center"  style="margin-bottom: 100px;">
                    {{ $users->links() }}
          </div> --}}

			</div>
		</div>
  </div>
    
    
           

<script>

//---------------------------------------//
$(document).ready(function(){
	// Activate tooltip
	$('[data-toggle="tooltip"]').tooltip();
	
	// Select/Deselect checkboxes
	var checkbox = $('table tbody input[type="checkbox"]');
	$("#selectAll").click(function(){
		if(this.checked){
			checkbox.each(function(){
				this.checked = true;                        
			});
		} else{
			checkbox.each(function(){
				this.checked = false;                        
			});
		} 
	});
	checkbox.click(function(){
		if(!this.checked){
			$("#selectAll").prop("checked", false);
		}
	});
});

</script>
</body>
</html>
