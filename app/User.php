<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'username', 
        'count300',
        'count100',
        'count50',
        'playcount',
        'ranked_score',
        'total_score',
        'pp_rank',
        'level',
        'pp_raw',
        'accuracy',
        'count_rank_ss',
        'count_rank_s',
        'count_rank_a',
        'country',
        'pp_country_rank'
    ];

    public function score()
    {
        return $this->hasMany(Score::class, 'user_id', 'user_id');
    }
}
