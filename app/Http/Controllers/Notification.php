<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Demandes;
use Illuminate\Support\Facades\Auth;

class Notification extends Controller
{
    public function suivi_demande()
    {
        $applys = Demandes::where('user_id', Auth::id())->get();
        return view('student.notification', ['applys' => $applys]);
    }
}
