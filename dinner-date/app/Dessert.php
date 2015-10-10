<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dessert extends Model
{
     /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'desserts';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['isFood', 'name'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [ 'remember_token'];

    public function users()
    {
    	return $this->belongsToMany('App\User', 'users_desserts', 'dessert_id', 'user_id');
    }
}
