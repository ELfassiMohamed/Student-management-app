<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Gestion des Demandes</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

 <link rel="stylesheet" href="css/table.css"> 
{{-- <link rel="stylesheet" href="css/sidebar.css"> --}}
<link rel="stylesheet" href="css/btn.css">

</head>
<body>
  <div class="navbar navbar-inverse" style="background-color: #435d7d;>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">

                <div class="navbar-header">
                    <button class="navbar-toggle" data-target="#mobile_menu" data-toggle="collapse"><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
                    <a href="javascript:void(0)" class="navbar-brand">Espace Enseignant</a>
                </div>

                <div class="navbar-collapse collapse" id="mobile_menu">
                    <ul class="nav navbar-nav">
                        
                        <li><a href="{{ Route('prof.dashboard') }}">Dashboard</a></li>
                        <li><a href="{{ Route('prof.index') }}">Propositions</a></li>
                         <li><a href="javascript:void(0)"  onclick="alert('Vous êtes sur la même page!')">Demande</a></li>
                        
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
           
    <!-----Message------->
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
    <!----------->
    <div class="container">
    	<h1 style="margin-top:30px;margin-bottom: 30px;">Gestion des Demandes</h1>
		<div class="table-responsive">
			<div class="table-wrapper">
				<div class="table-title">
					<div class="row">
						<div class="col-xs-6">
							<h2>Listes des Demandes</b></h2>
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
							{{-- <th>id</th> --}}
							<th>Etudint</th>
              <th>Proposition</th>
							<th>Apogee</th>	
              <th>E-mail</th>
              <th>Statut</th>	
              <th>Action</th>	
             				

						</tr>
					</thead>
					<tbody>
						<tr>
                        
              @foreach($demandes as $demande )
						
              {{-- <td>{{ $demande->id }}</td> --}}
							<td>{{ $demande->etudiant }}</td>
              <td>{{ $demande->titre_demande }}</td>
							<td>{{ $demande->apoge }}</td>
              <td>{{ $demande->email }}</td>
              <td>
                @if($demande->etat==1)
              <a href="javascript:void(0)" class ="btn btn-sm btn-warning" >En Attent </a>
              @endif
              @if($demande->etat==10)
              <a href="javascript:void(0)" class ="btn btn-sm btn-success" >Acceptée </a>
              @endif
              @if($demande->etat==3)
              <a href="javascript:void(0)" class ="btn btn-sm btn-danger" >Refusée </a>
              @endif
              </td>
               <td>
                <a href="javascripte:void(0)" onclick="editeDemande({{ $demande->id }})" class="btn btn-primary" ><span>Gérer la demande</span></a>
             </td> 
						</tr>
            @endforeach
					</tbody>
				</table>
       

			</div>
		</div>
  </div>
  
   <!---------------->
   <div id="editeDemandeModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">	
					<div class="modal-header">						
						<h4 class="modal-title">Répondu à la demande</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">
            <form id="editDemandeForm" action="{{ Route('demande.update') }}" method="POST"> 
              @csrf
              @method('PUT')   
              <input type="hidden" name="id" id="id" > 
            
            <div>
              <div class="box">
                <input type="checkbox" id="etat" name="etat" onclick="alert('Voulez-vous vraiment accepter cette demande!')" value="10">
                <span class="check"></span>
                <label for="etat">Accepter.</label>
              </div>
              <div class="box">
                <input type="checkbox" id="two" name="etat" onclick="alert('Si vous refusez la demande justifier pourquoi!')" value="3">
                <span class="check"></span>
                <label for="two">Refuser.</label>
              </div>
            </div>
            <div class="form-group">
              <label><h4><b>*Si vous refusez la demande justifier pourquoi</b></h4></label>
              <textarea class="form-control" name="message" id="message" rows="3"></textarea>
            </div>
            
					<div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
            <input type="submit" value="Validee" class="btn btn-primary">
          </div>
				</form> 
			</div>
		</div>
	</div>
</div> 
    
    
           

<script>


$('.response').click(function(){
    var resposne = $(this).attr('id');
    // It gives you: approved or declined

    // make an ajax call with this response and update the data in database
});

function editeDemande(id){
	  $('#editeDemandeModal').modal('toggle');
	  $.get('/prof/' + id, function(demande){
    $('#message').val(demande.message);
		$('#id').val(demande.id);
    
	  });
	}

  function accepteModal(id){
	  $('#accepteModal').modal('toggle');
	  $.get('/prof/' + id, function(aaa){
		$('#id').val(aaa.id);
	  });
	}
  
</script>
</body>
</html>
