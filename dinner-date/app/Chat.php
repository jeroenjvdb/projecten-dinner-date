<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
     /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'chat';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['messages', 'created_at'];

    public function sender(){
    	return $this->belongsTo('App\User', 'sender_id', 'id');
    }

    public function receiver(){
    	return $this->belongsTo('App\User', 'receiver_id', 'id');
    }

    public function users(){
                return \DB::table('chat')
                ->distinct()
                ->join('users', 'chat.sender_id', '=', 'users.id');
                // ->join('chat', 'receiver_id', '=', $this->id)

    }

    public function getMessageAttribute($val)
    {
        return htmlentities($val);
    }

    
}
