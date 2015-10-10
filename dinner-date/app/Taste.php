<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Taste extends Model
{
        /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'tastes';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['tastes'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [ 'remember_token'];

    public function users()
    {
    	return $this->belongsToMany('App\User', 'users_tastes', 'taste_id', 'user_id');
    }
}
