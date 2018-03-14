<?php

namespace App\Http\Controllers;

use App\Autopista;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $rol  = $user->hasRole('admin');
        if ($rol) {
            $autopistas = Autopista::latest()->paginate(10);
        } else {
            $autopistas = Autopista::with('usuarios')->paginate(5);
        }
        return view('autopistas.index')->withAutopistas($autopistas);
    }
}
