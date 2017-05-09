<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Content extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'alias',
        'page_order',
        'description',
        'created_by',
        'updated_by'

    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
    ];

    public function articles()
    {
        return $this->hasMany('App\Article')->withTimestamps();
    }

    public static function boot()
    {
        parent::boot();
        static::saving(function ($model) {
            $user = Auth::user();
            $model->updated_by = $user->id;
        });

        static::creating(function ($model) {
            $user = Auth::user();
            $model->created_by = $user->id;
            $model->updated_by = $user->id;
        });

        static::updating(function ($model) {
            $user = Auth::user();
            $model->updated_by = $user->id;
        });
    }

}
