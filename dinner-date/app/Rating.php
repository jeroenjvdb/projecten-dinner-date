<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
        /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'ratings';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['rating', 'rater_id', 'dish_id'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [ 'remember_token'];

    public function dish()
    {
    	return $this->belongsTo('App\Dish', 'dish_id', 'id');
    }

    public function rater()
    {
    	return $this->belongsTo('App\User', 'rater_id', 'id');
    }
    
    public function scopeFindRating($query, $dishId, $id)
    {
        return $query->where('dish_id', '=', $dishId)
            ->where('rater_id', '=',$id)
            ->first();
    }
}
