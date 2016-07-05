<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\User;
use App\League;
use App\Score;

class LeagueController extends Controller
{
    public function index()
    {
    	$users = User::with('score.beatmap')->get();
    	return view('modules.league', [
    		'users' => $users,
    	]);
    }

    public function show($league, $division = 1, $mode = 'standard', $requestedUser = false)
    {
        $mode = modeToInt($mode);

    	$league = League::where(['name' => $league, 'division' => $division, 'mode' => $mode])->first();

        if (!$league)
        {
            abort(404, 'That league does not exist');
        }

    	$users = User::where('mode', $mode)->whereBetween('pp_raw', [$league->minpp, $league->maxpp])->orderBy('pp_raw', 'desc')->get();

        // A true skilled programmer
    	$user_ids = array();
    	foreach($users as $user)
    	{
    		$user_ids[] = $user->user_id;
    	}

    	$scores = Score::with('beatmap')->where('mode', $mode)->whereIn('user_id', $user_ids)->orderBy('pp', 'desc')->take(10)->get();

    	return view('modules.league', [
    		'mode' => formatMode($mode),
    		'league' => $league,
    		'users' => $users,
    		'scores' => $scores,
    		'requestedUser' => $requestedUser
    	]);
    }
}
