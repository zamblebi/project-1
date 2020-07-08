<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
   
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['total'];

    public function clothings(){
        return $this->belongsToMany('App\Clothing');
    }
}
