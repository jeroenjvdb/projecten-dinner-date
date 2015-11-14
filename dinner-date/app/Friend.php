<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Friend extends Model
{
    




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
	  return $this->belongsToMany('App\User', 'friends', 'friend_id', 'user_id');
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

	// // access all friends
	// $user->friends; // collection of unique User model instances

	// // access friends a user invited
	// $user->friendsOfMine; // collection

	// // access friends that a user was invited by
	// $user->friendOf; // collection

	// // and eager load all friends with 2 queries
	// $usersWithFriends = User::with('friendsOfMine', 'friendOf')->get();

	// // then
	// $users->first()->friends; // collection

	// // Check the accepted value:
	// $user->friends->first()->pivot->accepted;
}
