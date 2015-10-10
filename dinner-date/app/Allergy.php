<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Allergy extends Model
{
     /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'allergies';

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
    	return $this->belongsToMany('App\User', 'users_allergies', 'allergy_id', 'user_id');
    }
}
