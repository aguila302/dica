<?php

namespace App\Http\Controllers;

use App\Autopista;
use Illuminate\Support\Facades\Auth;

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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $rol  = $user->hasRole('admin');
        if ($rol) {
            $autopistas = Autopista::get()->sortByDesc('nombre');
        } else {
            $autopistas = $user->autopistas->sortByDesc('nombre');
        }
        return view('autopistas.index')->withAutopistas($autopistas);
    }
}
