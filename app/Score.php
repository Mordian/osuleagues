<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Score extends Model
{
	protected $fillable = [
        'beatmap_id',
        'enabled_mods', 
        'user_id',
        'rank',
        'pp'
    ];


    public function user()
    {
    	return $this->belongsTo(User::class, 'user_id', 'user_id');
    }

    public function beatmap()
    {
        return $this->belongsTo(Beatmap::class, 'beatmap_id', 'beatmap_id');
    }
}
