<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    // protected $table ='team';
    protected $fillable = [
        'name'
    ];

    public function players()
    {
        return $this->hasMany('App\Player');
    }  
}
