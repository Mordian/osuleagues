<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Arielhr\Osuapi;
use App\User;
use App\Score;
use App\Beatmap;

class IndexController extends Controller
{
    public function index()
    {
    	$osu = new Osuapi(env('OSU_API_KEY'));

    	// $osu_user = $osu->get_user(['u' => 'arihosu']);
    	// $osu_user = (array) $osu_user[0];
    	
    	// $user = new User();
    	// $user->fill($osu_user);
    	// $user->canonical_username = strtolower($osu_user['username']);
    	// $user->save();

    	// return $user;

    	// $api_users_best = $osu->get_user_best(['u' => 'arihosu', 'limit' => 3]);


    	// foreach ($api_users_best as $user_best)
    	// {
    	// 	$user_best = (array) $user_best;

    	// 	$best = new Score($user_best);
    	// 	$best->save();
    	// }

    	// $api_beatmap = $osu->get_beatmaps(['b' => 556040]);

    	// $beatmap = new Beatmap((array) $api_beatmap[0]);
    	// $beatmap->save();

    	return User::with('score.beatmap')->get();
    }
}