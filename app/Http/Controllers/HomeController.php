<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Demandes;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function GetStatus (){
        $getetat=Demandes::select('etat')->first();
         if($getetat->etat==1){
            return redirect()->back()->with('success', '\'Votre demande a été accepteé!!');
         }
         if($getetat->etat==2){
            return redirect()->back()->with('success', '\'Votre demande a été refuseé!!');
         }
         
        
        
    } 
}
