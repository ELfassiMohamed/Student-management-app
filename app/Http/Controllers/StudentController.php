<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Propositions;
use App\Models\Demande;
use App\Models\Demandes;

class StudentController extends Controller
{
    public function show(){

        $user = Auth::user();

        return view('student.stdprofile')->with('user', $user);
}
public function update(Request $request, $id){

            $user = User::find($id);
            $user->password = Hash::make($request->password);
            $user->update();
            return redirect()->back()->with('status',' Updated Successfully');

}
public function show_prop(){

  $users = User::all();
  $props= Propositions::all();
  return view('student.stdprop',compact('props', 'users'));  
  
}


public function store_demande(Request $request)
    {
        $request->validate([
            'etudiant' => [ 'required','string', 'max:255'],
            'titre_demande' => [ 'required','string', 'max:255'],
            'apoge' => [ 'required', 'string','max:10'],
            'email' => ['required',  'string','max:10'],
            
            
            
        ]);
        $demandes = new Demandes();
        $demandes->titre_demande = $request->titre_demande;
        $demandes->etudiant = $request->etudiant;
        $demandes->apoge = $request->apoge;
        $demandes->email = $request->email;
        
       

        $demandes->save();
        return redirect()->back();
        
    }
   

}