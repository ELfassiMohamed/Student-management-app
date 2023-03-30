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

</head>
<body>
    <div class="navbar navbar-inverse" style="background-color: #435d7d;>
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">

                    <div class="navbar-header">
                        <button class="navbar-toggle" data-target="#mobile_menu" data-toggle="collapse"><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
                        <a href="#" class="navbar-brand">Espace Gestionnaire</a>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
    
                @if (session('status'))
                    <h6 class="alert alert-success">{{ session('status') }}</h6>
                @endif
    
                <div class="card">
                    <div class="card-header">
                        <h4> Editer Propositions
                            <a href="{{ url('prof') }}" class="btn btn-danger float-end">BACK</a>
                        </h4>
                    </div>
                    <div class="card-body">
    
                        <form action="{{ url('proposition-update/'.$props->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group mb-3">
                                <input type="hidden" name="statut" value="0">
                                <label>Titre</label>
                                <input type="text" class="form-control"  name="titre" value="{{ $props->titre }}">
                              </div>
                              
                              <div class="form-group mb-3">
                                <label>Cycle</label>
                                <select name="cycle" value="{{ $props->cycle }}"  class="form-control"  >
                                    <option value="" disabled selected>Select your option</option>
                                    <option value="Licences">Licences</option>
                                    <option value="Masters">Masters</option>
                                </select>
                              </div>
                              <div class="form-group mb-3">
                                <label>Departement</label>
                                <select  name="depart" value="{{ $props->depart }}"  class="form-control"  >
                                    <option value="" disabled selected>Select your option</option>
                                    <option value="Informatique">Informatique</option>
                                    <option value="Mathematique">Mathematique</option>
                                    <option value="Physique">Physique</option>
                                    <option value="Chimie">Chimie</option>
                                    
                                </select>
                              </div>
                              
                                <div class="form-group mb-3">
                                <label>Filiere</label>
                                <select  name="filiere" value="{{ $props->filiere }}"  class="form-control"  >
                                    <option value="" disabled selected>Select your option</option>
                                    <option value="SMI">SMI</option>
                                    <option value="SMA">SMA</option>
                                    <option value="SMP">SMP</option>
                                    <option value="SMC">SMC</option>
                                    <option value="SVI">SVI</option>
                                    <option value="SVT">SVT</option>
                                    
                                </select>
                              </div>
                              <div class="form-group mb-3">
                                <label>Type Prpositions</label>
                                    <select name="type_props" value="{{ $props->type_props }}"  class="form-control"  >
                                      <option value="" disabled selected>Select your option</option>
                                      <option value="Monome">Monome</option>
                                      <option value="Binome">Binome</option>
                                  </select>
                                </div>
                  
                                <div class="form-group mb-3">
                                <label>Description</label>            
                                  <textarea class="form-control" name="description" value="{{ $props->description }}" rows="3" ></textarea>
                                </div>   
                                <div class="form-group mb-3">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                                    <button type="submit" class="btn btn-primary">Update Proposition</button>
                                </div> 
                           
    
                        </form>
    
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>