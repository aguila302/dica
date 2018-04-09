<?php

namespace App;

use App\Autopista;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Collection;
use Laravel\Passport\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use Notifiable, HasRoles, HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'username', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Autopistas asignadas a este usuario.
     *
     * @return Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function autopistas()
    {
        return $this->belongsToMany(Autopista::class, 'autopista_user')->withTimestamps();
    }

    /**
     * Asigna autopistas a este usuario.
     *
     * @param Collection|array $autopista
     *
     * @return void
     */
    public function asignaAutopista($autopista)
    {
        $this->autopistas()->attach($autopista);
    }

    /**
     * Quita aautopistas asignadas a este usuario.
     *
     * @param mixed $autopista
     *
     * @return void
     */
    public function quitaAutopista($autopista)
    {
        $this->autopistas()->detach($autopista);
    }

    /**
     * Busca un usuario para autenticarlo con Passport
     *
     */
    public function findForPassport($identifier)
    {
        return $this->orWhere('email', $identifier)->orWhere('username', $identifier)->first();
    }

    /**
     * Crea un nuevo usuario en el origen de datos.
     *
     * @param array $data
     */
    public static function createUsuario($data)
    {
        $user           = new static($data);
        $user->password = bcrypt($data['password']);
        $user->save();
    }
}
