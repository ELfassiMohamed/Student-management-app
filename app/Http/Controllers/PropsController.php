<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Propositions;
use App\Models\User;
use App\Models\Demandes;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PropsController extends Controller
{
    public function show (){
        $users = User::all();
        $props= Propositions::all();
        return view('enseignant.props',compact('props', 'users'));  
        
    }

    public function update (Request $request)
    {
        $demandes = Demandes::find($request->id);
        $demandes->etat = $request->etat;
        $demandes->save();
      
        return redirect()->back();
    }

    public function showw ($id)
    {  
        $aaa = Demandes::find($id);
        return response()->json($aaa); 
    }


    public function show_prof (){

        $user = Auth::user();

        return view('prof.profile')->with('user', $user);
}


    public function update_prof(Request $request, $id){

        $user = User::find($id);
        $user->password = Hash::make($request->password);
        $user->save();
        return redirect()->back()->with('status',' Updated Successfully');}








}
