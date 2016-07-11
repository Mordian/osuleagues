<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\League;
use App\Score;
use Arielhr\Osuapi;
use Log;

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

    private $osu;

    public function __construct()
    {
        parent::__construct();

        $this->osu = app('Osu');
    }

    public function score()
    {
        return $this->hasMany(Score::class, 'user_id', 'user_id');
    }

    public function getLeague()
    {
        return League::where('maxpp', '>', $this->pp_raw)
            ->where('minpp', '<=', $this->pp_raw)
            ->where('mode', $this->mode)
            ->first();
    }

    public function findInApi($username, $mode)
    {
        Log::info('Made API request for user ' . $username . ' in mode ' . $mode);
        $osu_user = $this->osu->get_user(['u' => $username, 'm' => $mode]);

        if (!$osu_user)
        {
            Log::debug('Couldnt find user?');
            return false;
        }

        $osu_user = (array) $osu_user[0];

        if ($osu_user['pp_raw'] == 0 && $osu_user['level'] > 10)
        {
            abort(410, "It seems that " . $username . " is inactive");
        }
        
        $this->fill($osu_user);
        $this->mode = $mode;
        $this->canonical_username = strtolower($username);

        return $this;
    }

    public function getScores()
    {
        // Can't decouple this
        // Get the user best scores
        Log::info('Made API request for scores');
        $api_users_best = $this->osu->get_user_best([
            'u' => $this->username, 
            'm' => $this->mode, 
            'limit' => 3]);

        foreach ($api_users_best as $user_best)
        {
            // Check if this score exists
            $score = Score::where([
                'beatmap_id' => $user_best->beatmap_id,
                'user_id' => $user_best->user_id,
                'mode' => $this->mode,
            ])->first();

            if ($score)
            {
                // If the score exist but PP's changed, then update
                if ($score->pp != number_format($user_best->pp, 2))
                {
                    Log::info('Found an existing score with different PP, updating score '.$score->pp.' to '.$user_best->pp);
                    $score->fill( (array) $user_best);
                    $score->update();
                }
            } 
            else 
            {
                $score = new Score( (array) $user_best);
                $score->mode = $this->mode;
                $score->save();
            }
            
            // Check if beatmap exists
            $beatmap = Beatmap::where('beatmap_id', $user_best->beatmap_id)->first();

            if (!$beatmap)
            {
                Log::info('Made API request for one beatmap');
                $api_beatmap = $this->osu->get_beatmaps(['b' => $user_best->beatmap_id]);

                $beatmap = new Beatmap( (array) $api_beatmap[0]);
                $beatmap->save();
            }
            else
            {
                continue;
            }
        }
    }
}
