<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\League;
use Arielhr\Osuapi;

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

    public function getLeague()
    {
        return League::where('maxpp', '>=', $this->pp_raw)->first();
    }

    public function getScores($osu)
    {
        // Get the user best scores
        $api_users_best = $osu->get_user_best([
            'u' => $this->username, 
            'm' => $this->mode, 
            'limit' => 3]);

        foreach ($api_users_best as $user_best)
        {
            $user_best_array = (array) $user_best;

            $best = new Score($user_best_array);
            $best->mode = $this->mode;
            $best->save();
            
            $beatmap = Beatmap::where('beatmap_id', $user_best->beatmap_id)->first();

            if (!$beatmap)
            {
                $api_beatmap = $osu->get_beatmaps(['b' => $user_best->beatmap_id]);

                $beatmap = new Beatmap((array) $api_beatmap[0]);
                $beatmap->save();
            }
            else
            {
                continue;
            }
        }
    }
}
