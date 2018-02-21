<?php

namespace App;

use App\Autopista;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
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
     * @param [type] $autopista [description]
     *
     * @return [type] [description]
     */
    public function asignaAutopista($autopista)
    {
        $this->autopistas()->attach($autopista);
    }
}
