<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dish extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'dishes';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'sDescription', 'lDescripion', 'difficulty', 'ingredients', 'preparations', 'fittingDrinks', 'user_id', 'duration', 'photo_url'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [ 'remember_token'];

    public function user()
    {
    	return $this->belongsTo('App\User', 'user_id', 'id');
    }

    public function rating()
    {
        return $this->hasMany('App\Rating', 'dish_id', 'id')->avg('rating'); //moet nog berekent worden volgens de ratings
    }
}
