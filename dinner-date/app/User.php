<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract,
                                    AuthorizableContract,
                                    CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'surname', 'email', 'password', 'perfectDate', 'spicyness', 'favoriteDish', 'specialAllergies', 'housenumber', 'streetname', 'city', 'dateofBirth'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    /*
    * one to many
    */

    public function dishes()
    {
        return $this->hasMany('App\Dish', 'user_id', 'id');
    }

    public function ratings()
    {
        return $this->hasMany('App\Rating', 'user_id', 'id');
    }

    public function myDates()
    {
        return $this->hasMany('App\Date', 'host_id', 'id' );
    }

    public function pictures()
    {
        return $this->hasMany('App\Picture', 'user_id', 'id');
    }

    public function chatSend()
    {
        return $this->hasMany('App\Chat', 'sender_id', 'id');
    }

    public function chatReceive()
    {
        return $this->hasMany('App\Chat', 'receiver_id', 'id');
    }

    public function relatedChat()
    {
        return $this->chatsend()->distinct();
    }



    /*
    * many to many
    */

    public function tastes()
    {
        return $this->belongsToMany('App\Taste', 'users_tastes', 'user_id', 'taste_id');
    }

    public function  kitchens()
    {
        return $this->belongsToMany('App\Kitchen', 'users_kitchens', 'user_id', 'kitchen_id');
    }

    public function desserts()
    {
        return $this->belongsToMany('App\Dessert', 'users_desserts', 'user_id', 'dessert_id');
    }

    public function dates()
    {
        return $this->belongsToMany('App\Date', 'users_dates', 'user_id', 'id');
    }

    public function allergies()
    {
        return $this->belongsToMany('App\Allergy', 'users_allergies', 'user_id', 'id');
    }

    /*
    * has many through
    */
    public function friends(){
        return $this->belongsToMany('App\User', 'friends', 'user_id', 'friend_id');
    }



    /*
    * helper functions
    */

    public function fullName()
    {
        return $this->surname . ' ' . $this->name;
    }

}
