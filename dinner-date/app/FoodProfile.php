<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FoodProfile extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'food_profiles';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id','salt','sweet','bitter','sour','umami',
        'spicy','chinese','japanese','french',
        'greek','italian','cow_milk','eggs',
        'shellfish','peanuts','treenuts','wheats','soy',
    ];

    public function users()
    {
        return $this->hasOne('App\User', 'food_profiles', 'id', 'user_id');
    }

}
