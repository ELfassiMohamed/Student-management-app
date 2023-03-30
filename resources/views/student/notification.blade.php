<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Gestion des Demandes</title>
<!-- <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">-->
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons"> 
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
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
                             <li><a  href="{{Route('student.stdprop')}}"  >Propositions</a></li>
                             <li><a href="javascript:void(0)" onclick="alert('Vous êtes sur la même page!')">Mes Demandes</a></li>
                            
                        </ul>
                        
                    </div>
                </div>
            </div>
        </div>
    
    <div class="container">
        <h1 style="margin-top:30px;margin-bottom: 30px;">Gestion des Demandes</h1>
            <div class="table-responsive">
                <div class="table-wrapper">
                    <div class="table-title">
                        <div class="row">
                            <div class="col-xs-6">
                                <h2>Mes Demandes</b></h2>
                            </div>
                           						
                            </div>
                        </div>
              
                    </div>
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                 
                                <th></th>
                                <th>Etat demande</th>
                                <th>Discription</th>
                                <th></th>
                                </tr>
                        </thead>
                        <tbody>
                            <tr>
                            
                @foreach($applys as $value )
                @if($value->etat ==1  )
                <td></td>
                <td style="width:30%">
                    <a href="javascript:void(0)" class="btn btn-warning dismiss-notification">En attente</a>
                    </td>
                <td><h4>{{ __(' Votre demande du sujet :   ')}}<b>{{ $value->titre_demande }}</b>{{ __(' a été envoyée et toujours en cours.    ')}}</h4></td>
                
                    <td></td>
                    
                @endif
                @if($value->etat ==10  )
                <td></td>
                <td style="width:30%">
                    <a href="javascript:void(0)" class="btn btn-success dismiss-notification">Accptee</a>
                    </td>
                <td><h4>Votre demande d'encadrement du sujet   <b>{{ $value->titre_demande }}</b> est Acceptée   </h4></td>
                
                    <td></td>
                    
                @endif
                @if($value->etat ==3 )
                <td></td>
                <td style="width:30%">
                    
                    <a href="javascript:void(0)" class="btn btn-danger dismiss-notification">Refusse</a>
                    </td>
                <td><h4>Votre demande d'encadrement du sujet  <b>{{ $value->titre_demande }}</b> est Refusée  justification : <b>{{ $value->message }}</b></h4></td>
                
                    <td></td>
                @endif
                                
                
                </tr>
                @endforeach
                </tbody>
                </table>
            <div class="d-flex justify-content-center"  style="margin-bottom: 100px;">
                       
              </div>
    
                </div>
            </div>


  
</div> 
</body>
</html>    