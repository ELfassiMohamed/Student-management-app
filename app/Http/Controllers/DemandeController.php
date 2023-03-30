<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Demandes;
use App\Models\Propositions;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class DemandeController extends Controller
{
    
    public function store_demande (Request $request)
    {
        
        $request->validate([
            'etudiant' => ['required', 'string', 'max:255'],
            'apoge' => ['required', 'string','max:10'],
            'titre_demande' => [ 'string','max:255'],
            'etat' => ['required', 'string','max:10'],
            'etat_prop' => ['required', 'string','max:10'],
            'email' => ['required', 'string', 'email', 'max:255'],   
        ]);
       
        $demandes = new Demandes();
        $demandes->user_id = auth::user()->id;
        $demandes->etat = $request->etat;
        $demandes->titre_demande = $request->titre_demande;
        $demandes->etudiant = $request->etudiant;
        $demandes->apoge = $request->apoge;
        $demandes->email = $request->email;
        $demandes->etat_prop = $request->etat_prop;
        $demandes->save();
        
      
        return redirect()->back()->with('success', '\'Votre demande a été envoyé!!');
        
    }

    public function update (Request $request)
    {
        $demandes = Demandes::find($request->id);
        $demandes->etat = $request->etat;
        $demandes->etat_prop = $request->etat_prop;
         $demandes->message = $request->message;
        $demandes->save();
      
        return redirect()->back();
    }

    

    public function show($id)
    {
        $value = Demandes::find($id);
        return response()->json($value);  
    }
    

    public function afficher_demande()
    {  
        $demandes = Demandes::all();
        return view('prof.demande', compact('demandes'));
    
    }
    
    
   


    
}

