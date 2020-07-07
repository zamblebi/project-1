<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
   
    

    public function clothing(){
        return $this->hasMany('App\Clothing');
    }
}
