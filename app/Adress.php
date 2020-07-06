<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Adress extends Model
{
    protected $fillable = [
        'adress', 'type_adress', 'other_details'
    ];
    
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
