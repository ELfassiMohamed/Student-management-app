<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $etudiants = User::where('isAdmin', '!=', true)->paginate(5);
        return view('admin.index',['etudiants' => $etudiants]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'name' => ['required', 'string', 'max:255'],
            'prenom' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'cne' => ['required', 'string','max:10'],
            'apoge' => ['required', 'string','max:10'],
            
            
        ]);
        $user = new User();
        $user->name = $request->name;
        $user->prenom = $request->prenom;
        $user->email = $request->email;
        $user->cne = $request->cne;
        $user->apoge = $request->apoge;
        $user->year = $request->year;
        $user->unv = $request->unv;
        $user->role = $request->role;
        $user->dept = $request->dept;
        $user->filiere = $request->filiere;
        $user->password = Hash::make($request->name . '2022');

        $user->save();
        return redirect()->back()->with('success', 'L\'Utilisateur a été bien ajouté !!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        return response()->json($user);  
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request )
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'prenom' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'cne' => ['required', 'string','max:10'],
            'apoge' => ['required', 'string','max:10'],

        ]);


        $user = User::find($request->id);

        if($user->email == $request->email){
            $user->name = $request->name;
            $user->prenom = $request->prenom;
            $user->cne = $request->cne;
            $user->apoge = $request->apoge;
            $user->year = $request->year;
            $user->unv = $request->unv;
            $user->dept = $request->dept;
            $user->role = $request->role;
            $user->filiere = $request->filiere;
        }else{
            $request->validate([
                'email' => ['required', 'string', 'email', 'max:255','unique:users']
            ]);
            $user->name = $request->name;
            $user->prenom = $request->prenom;
            $user->cne = $request->cne;
            $user->apoge = $request->apoge;
            $user->year = $request->year;
            $user->unv = $request->unv;
            $user->dept = $request->dept;
            $user->role = $request->role;
            $user->filiere = $request->filiere;
            $user->email = $request->email;
        }   

        

        $user->save();

        return redirect()->back()->with('success', 'L\'Utilisateur a été bien modifie !!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::destroy($id);
        return redirect()->back();
    }
}
