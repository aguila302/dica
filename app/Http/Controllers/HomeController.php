<?php

namespace App\Http\Controllers;

use App\Autopista;
use App\User;
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
            $autopistas = Autopista::latest()->get();
        } else {
            $autopistas = $user->autopistas;
            // dd($autopistas->get;
            // $autopistas = User::with(['autopistas' => function ($query) use ($user) {
            //     $query->where('user_id', $user->id);
            // }])->paginate();

            // $autopistas = Autopista::with('usuarios')->paginate(5);
        }
        return view('autopistas.index')->withAutopistas($autopistas);
    }
}
