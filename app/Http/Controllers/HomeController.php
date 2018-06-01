<?php

namespace App\Http\Controllers;

use App\Autopista;
use App\User;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

    /**
     * Muestra un listado de las autopistas.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $rol  = $user->hasRole('administrador');
        if ($rol) {
            $autopistas = Autopista::latest()->paginate(10);
        } else {
            $autopistas = $user->autopistas()->paginate(10);
        }
        return view('autopistas.index')->withAutopistas($autopistas);
    }
}
