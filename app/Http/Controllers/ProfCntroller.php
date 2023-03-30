<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Propositions;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ProfCntroller extends Controller
{
    public function show()
    {
        $users = DB::table('users')->where('role','!=','gestionnaire')->paginate(10);
        return view('enseignant.chefdep',['users' => $users]);
    }

    public function show_prof (){

        $user = Auth::user();

        return view('prof.dashboard')->with('user', $user);
}

        public function setVisible ($id){
            $getstatut=Propositions::select('statut')->where('id',$id)->first();
            if($getstatut->statut==0){
               $statut=1;
            }
            
             else{$statut=0;}
       Propositions::where('id',$id)->update(['statut'=>$statut]);
        return redirect()->back();}


        public function show_profile (){

            $user = Auth::user();
    
            return view('enseignant.editer')->with('user', $user);
    }


        public function update(Request $request, $id){

            $user = User::find($id);
            $user->password = Hash::make($request->password);
            $user->update();
            return redirect()->back()->with('status',' Updated Successfully');}



}
