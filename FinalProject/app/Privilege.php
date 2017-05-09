<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Privilege extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'description'];

    protected $table = 'user_privileges';

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
    ];

    public function users()
    {
        return $this->belongsToMany('App\User', 'user_has_user_privilege');
    }
}
