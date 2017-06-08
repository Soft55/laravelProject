<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Properties extends Model
{
    protected $fillable = ['longitude','latitude','user_id'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
