{{-- @extends('layouts.app')
@section('content') --}}

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
<link href="css/table.css" rel="stylesheet">
</head>
<body>

<!--NAV BAR--->
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
                      
                    <li><a href="javascript:void(0)"  onclick="alert('Vous êtes sur la même page!')">Dashboard</a></li>
                    
                     <li><a href="{{Route('student.stdprop')}}">Propositions</a></li>
                     <li><a href="{{Route('student.notification')}}">Mes Demandes</a></li>
                      
                  </ul>
                 

                  <ul class="nav navbar-nav navbar-right">
                      <li><a href="{{Route('student.stdprofile')}}"><span class="glyphicon glyphicon-user"></span> Profile : {{Auth::user()->name}}</a></li>
                     
                      <li><a href="#"class="dropdown-toggle" data-toggle="dropdown" ><span class="glyphicon glyphicon-log-in">
                        </span> <span class="caret"></span>
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



 <div id="wrapper">
		<!-- Sidebar -->
		
		
		<!-- Page Content -->
		
{{-- <div class="container">
    <div class="row justify-content-center">
        
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                   <p> <h3>{{ __('Bonjour ')}}{{Auth::user()->name}} {{Auth::user()->prenom}}</h3></p>
                </div>
            </div>
        </div>
    </div>
     --}}
     <div class="container">
        <h1 style="margin-top:30px;margin-bottom: 30px;">Dashboard</h1>
        <div class="table-responsive">
            <div class="table-wrapper">
                <div class="table-title">
                    <div class="row">
                        <div class="col-xs-6">
                            <h2>Espace Etudiant </b></h2>
                        </div>					
                        </div>
                    </div>
                </div>
                <table class="table table-striped table-hover">
                    <thead>
                        <tr> 
                            <th><h3>{{ __('Bonjour Mr. ')}}{{Auth::user()->name}} {{Auth::user()->prenom}}</h3></th>
                           
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td></td>
                        </tr>
                       
                    </tbody>
                </table>
    
            </div>
        </div> 


<script>
  
  
  </script>
  </body>
  </html>

