<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>ETUDIANT PROFILE</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="/css/profile.css">



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
                        <li><a href="javascript:void(0)"  onclick="alert('Vous êtes sur la même page!')">Profile</a></li>
                         <li><a href="{{Route('student.stdprop')}}"  >Propositions</a></li>
                        
                    </ul>
                    
                </div>
            </div>
        </div>
    </div>
	 <div class="containeeer">
    
            <div class="card">
                
                <div class="info"> <span>Mon Profile</span><a href="#editStudentModal"  class="btn btn-primary" data-toggle="modal" >Editer</a>
                </div>
                <div class="forms">
                    <div class="inputs"> <h4>Nom et Prenom </h4>{{ $user->name }}</div>
                    <div class="inputs"> <h4>Prenom</h4>{{ $user->prenom }}</div>
                    <div class="inputs"> <h4>CNE</h4>{{ $user->cne }}</div>
                    <div class="inputs"> <h4>Etablissemet</h4>{{ $user->unv }}</div>
                    <div class="inputs"> <h4>FIliere</h4>{{ $user->filiere }}</div>
                    <div class="inputs"> <h4>Adresse E-mail</h4>{{ $user->email }}</div>
                </div>
            </div>
        
        </div>
        <!-- Edit Modal HTML -->
	<div id="editStudentModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">						
                    <h4 class="modal-title">Modifier Etudiant</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
            <form  action="{{ url('update-student/'.$user->id) }}" method="POST">
                        @csrf
                        @method('PUT')						                                
                <div class="form-group">
                <label>Mot de Pass</label>
                <input type="password" class="form-control" value="{{ $user->password }}" name="password" placeholder="Nouveau Mot de Passe">
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
    <script>
        
        
  
  
  
        </script>
    
</body>
</html>