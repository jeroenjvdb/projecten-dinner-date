<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Date extends Model
{
     /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'dates';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['date'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [ 'remember_token'];

    public function users()
    {
    	return $this->belongsToMany('App\User', 'users_dates', 'date_id', 'user_id');
    }

    public function host()
    {
        return $this->belongsTo('App\User', 'host_id', 'id');
    }
}
