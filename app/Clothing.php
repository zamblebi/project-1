<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clothing extends Model
{
   
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'prix','category_id', 'image'];

    public function orders()
    {
        return $this->belongsToMany('App\Order');
    }


    public function category()
    {
        return $this->belongsTo('App\Category');
    }
}