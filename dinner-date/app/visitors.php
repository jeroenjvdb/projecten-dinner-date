<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class visitors extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'visitors';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['visited','visitor'];

    /**
     * @param $query
     * @param $id
     * @return mixed
     */
    public function scopecheckToday($query)
    {
        return $query->where('visitors.updated_at','=',Carbon::today());
    }

    /**
     * @param $query
     * @param $id
     * @return mixed
     */
    public function scopeallVisitors($query,$id)
    {
        return $query->where('visited',$id)
            ->count();
    }

    /**
     * @param $query
     * @param $id
     */
    public function scopeGetUsers($query,$id)
    {
        return $query->where('visitors.visited',$id)
            ->join('users','users.id','=','visitors.visited');
    }
}