<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Auth;

class User extends Authenticatable
{

    protected $table = 'users';
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

    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = bcrypt($password);
    }

    /*
    relationships
     */

    public function pages()
    {
        return $this->hasMany('App\Page');
    }

    public function contentAreas()
    {
        return $this->hasMany('App\Content');
    }

    public function cssTemplates()
    {
        return $this->hasMany('App\Template');
    }

    public function articles()
    {
        return $this->hasMany('App\Article');
    }


    public function privileges()
    {
        return $this->belongsToMany('App\Privilege', 'user_has_user_privilege', 'user_id', 'privilege_id', 'users');
    }

    public function isAAdmin()
    {
        if(Auth::check())
        {
            $privileges = $this->privileges()->get();
            foreach($privileges as $privilege) {
                if($privilege->name == 'Admin')
                {
                    return true;
                }
            }
        }
        return false;
    }

    public function isAnEditor()
    {
        if(Auth::check())
        {
            $privileges = $this->privileges()->get();
            foreach($privileges as $privilege) {
                if($privilege->name == 'Editr')
                {
                    return true;
                }
            }
        }
        return false;
    }

    public function isAnAuthor()
    {
        $privileges = $this->privileges()->get();
        foreach($privileges as $privilege) {
            if($privilege->name == 'Authr')
            {
                return true;
            }
        }
        return false;
    }

    //https://laracasts.com/discuss/channels/eloquent/listen-to-any-saveupdatecreate-event-for-any-model
    public static function boot()
    {
        parent::boot();
        static::saving(function ($model) {
            $user = Auth::user();
            if($user != null)
                $model->updated_by = $user->id;
        });

        static::creating(function ($model) {
            $user = Auth::user();
            if($user != null) {
                $model->created_by = $user->id;
                $model->updated_by = $user->id;
            }
        });

        static::updating(function ($model) {
            $user = Auth::user();
            if($user != null)
                $model->updated_by = $user->id;
        });
    }
}
