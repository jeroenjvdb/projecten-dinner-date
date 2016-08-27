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

    public function scopecheckToday($query,$id)
    {
        return $query->where('visited',$id)
            ->where('updated_at','<',Carbon::tomorrow())
            ->where('updated_at','>',Carbon::yesterday())
            ->count();
    }

    public function scopeallVisitors($query,$id)
    {
        return $query->where('visited',$id)
            ->count();
    }
}
