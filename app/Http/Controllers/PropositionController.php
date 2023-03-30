<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Propositions;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Demandes;

class PropositionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {  
         
         $props = Propositions::where('user_id', Auth::id())->get();
        return view('prof.index',['props' => $props]);


        // $propositions = DB::table('propositions')->paginate(10);
        // return view('prof.props',['proposition' => $propositions]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   

        
        $request->validate([
            'titre' => ['required', 'string', 'max:255'],
            'filiere' => ['string', 'max:255'],
            'depart' => ['required', 'string', 'max:255'],
            'cycle' => ['required', 'string','max:10'],
            'statut' => ['required', 'string','max:10'],
            'type_props' => ['required', 'string','max:10'],
            'description' => ['required', 'string', 'max:255'],   
        ]);

        $propositions = new Propositions();
        $propositions->user_id = Auth::id();
        $propositions->titre = $request->titre;
        $propositions->statut = $request->statut;
        $propositions->depart = $request->depart;
        $propositions->filiere = $request->filiere;
        $propositions->cycle = $request->cycle;
        $propositions->type_props = $request->type_props;
        $propositions->description = $request->description;
       

        $propositions->save();
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {  
        $value = Demandes::find($id);
        return response()->json($value); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $props = Propositions::find($id);
        return view('prof.edit', compact('props'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        
      
        $propositions =  Propositions::find($request->id);
        $propositions->titre = $request->titre;
        $propositions->depart = $request->depart;
        $propositions->filiere = $request->filiere;
        $propositions->cycle = $request->cycle;
        $propositions->type_props = $request->type_props;
        $propositions->description = $request->description;
        $propositions->save();
        return redirect()->back()->with('status','Student Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Propositions::destroy($id);
        return redirect()->back();
    }
}
