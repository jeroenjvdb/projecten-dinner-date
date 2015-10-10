<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kitchen extends Model
{
        /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'kitchens';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [ 'remember_token'];

    public function users()
    {
    	return $this->belongsToMany('App\User', 'users_kitchens', 'kitchen_id', 'user_id');
    }
}
