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
    protected $fillable = [
        'date','area','name_dish','description',
        'preference','typeOfDate','host_id','dish_id',
    ];
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

    public function dish()
    {
        return $this->hasOne('App\Dish', 'id', 'dish_id');
    }

    public function host()
    {
        return $this->belongsTo('App\User', 'host_id', 'id');
    }

    public function pictures()
    {
        return $this->belongsTo('App\Picture', 'host_id', 'user_id');
    }

    public function scopeMyDates($query,$id)
    {
       return $query->where('host_id',$id);
    }

    public function scopeExtraInfo($query)
    {
        return $query->join('dishes', 'dishes.id', '=', 'dates.dish_id')
            ->join('users','users.id','=','dates.host_id');
    }
    public function scopeExtraInfoSelect($query)
    {
        return $query->select(
            'dates.id as id',
            'users.surname as user_name', 'dishes.name as dish_name',
            'photo_url','date', 'description','typeofdate','area'
        );
    }
}
