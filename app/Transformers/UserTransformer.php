<?php

namespace App\Transformers;

use App\Autopista;
use App\User;
use League\Fractal\TransformerAbstract as BaseTransformer;

class UserTransformer extends BaseTransformer
{

    /**
     * Transforma un usuario en arreglo para representarlo en el api.
     *
     * @param  User   $user
     * @return array
     */
    public function transform(User $user)
    {
        $rol = $user->hasRole('admin');
        if ($rol) {
            $autopistas = Autopista::latest()->get();
        } else {
            $autopistas = $user->autopistas;
        }

        $autopista = new Autopista;
        return [
            'id'         => $user->id,
            'name'       => $user->name,
            'email'      => $user->email,
            'autopistas' => $autopistas,
        ];
    }
}
