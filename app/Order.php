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
    protected $fillable = ['user_id','carts','adress_maps','adress_details','deliverable_date','deliverable_type','all_prices','deliver'];

    public function clothings(){
        return $this->belongsToMany('App\Clothing');
    }
    public function user(){
        return $this->belongsTo('App\User', 'user_id', 'id');
    }
}
