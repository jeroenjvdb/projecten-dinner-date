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

    public function user()
    {
    	return $this->belongsTo('App\User', 'user_id', 'id');
    }

    public function scopeProfilePics($query,$user_id)
    {
        return $query->where('user_id', '=', $user_id)
        ->where('isDish', '=', false)
        ->orderBy('id', 'desc')
        ->take(5)
        ->get();
    }

    public function scopeRemoveLast($query,$id)
    {
        $pic = $query->where('user_id','=',$id)
            ->orderBy('created_at', 'asc')
            ->first();
        unlink($pic->picture_url);
        $pic->delete();
    }

    public function scopeProfile($query,$id)
    {
        $query->where('user_id','=',$id)
            ->where('isDish','=',0)
            ->select('picture_url')
            ->first();
    }
}
