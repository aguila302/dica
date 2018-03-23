<?php

namespace App\Transformers;

use App\Autopista;
use App\User;
use Illuminate\Support\Facades\Auth;
use League\Fractal\TransformerAbstract as BaseTransformer;

class UserTransformer extends BaseTransformer
{
    /**
     * Lista de recursos que se incluiran automaticamente.
     *
     * @var array
     */
    // protected $defaultIncludes = ['autopista'];

    /**
     * Transforma un usuario en arreglo para representarlo en el api.
     *
     * @param  User   $user
     * @return array
     */
    public function transform(User $user)
    {
        $autopista = new Autopista;
        return [
            'id'         => $user->id,
            'name'       => $user->name,
            'email'      => $user->email,
            'autopistas' => Auth::user()->autopistas,
        ];
    }

    /**
     * Incluye la autopista.
     *
     * @param  User   $user
     * @return \League\Fractal\Resource\Item
     */
    // public function includeAutopista(User $user)
    // {

    //     $autopistas = $user->autopistas->where('user_id', $user->id);
    //     dd($autopistas);

    //     return $this->item($$autopistas, new AutopistaTransformer);
    // }
}
