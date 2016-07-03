<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Beatmap extends Model
{
    protected $fillable = [
        'beatmap_id',
        'artist', 
        'title',
        'difficultyrating',
        'mode'
    ];

    public function score()
    {
    	return $this->hasMany(Score::class, 'beatmap_id', 'beatmap_id');
    }
}
