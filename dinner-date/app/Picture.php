<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Picture extends Model
{
        /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'pictures';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['picture_url', 'description', 'isDish', 'user_id'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [ 'remember_token'];

    public function users()
    {
    	return $this->belongsTo('App\User', 'user_id', 'id');
    }
}
