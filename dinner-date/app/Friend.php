<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Friend extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'friends';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id','accepted','user_id','friend_id','date_id'
    ];
    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [ 'remember_token'];

	function friend()
	{
		return $this->belongsTo('App\User', 'friend_id', 'id');
	}

	function user()
	{
		return $this->belongsTo('App\User', 'user_id', 'id');
	}


    // friendship that I started
	function friendsOfMine()
	{
	  return $this->belongsToMany('App\User', 'friends', 'user_id', 'friend_id')
	     ->wherePivot('accepted', '=', 1) // to filter only accepted
	     ->withPivot('accepted'); // or to fetch accepted value
	}

	// friendship that I was invited to 
	function friendOf()
	{
	  return $this->belongsToMany('App\User', 'friends', 'friend_id', 'user_id')
	     ->wherePivot('accepted', '=', 1)
	     ->withPivot('accepted');
	}

	// accessor allowing you call $user->friends
	public function getFriendsAttribute()
	{
	    if ( ! array_key_exists('friends', $this->relations)) $this->loadFriends();

	    return $this->getRelation('friends');
	}

	protected function loadFriends()
	{
	    if ( ! array_key_exists('friends', $this->relations))
	    {
	        $friends = $this->mergeFriends();

	        $this->setRelation('friends', $friends);
	    }
	}

	protected function mergeFriends()
	{
	    return $this->friendsOfMine->merge($this->friendOf);
	}

	public function scopeGetRequests($query,$user_id)
	{
		return $query->where('friend_id', '=', $user_id)
			->where('accepted', '=', false)
			->get();
	}

    public function scopeGetFriends($query,$user_id)
    {
        return $query->where('friend_id', '=', $user_id)
            ->where('accepted', '=', true)
            ->get();
    }

	public function scopeCheckFriendshipExist($query, $id1, $id2)
	{
		return $query->where('user_id', '=', $id1)
		->where('friend_id', '=', $id2)
		->exists();
	}

	public function scopeDelete($query,$id)
    {
       return $query->where('user_id', '=', $id)
        ->where('friend_id', '=', Auth::user()->id)
        ->delete();
    }
}
