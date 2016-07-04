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

    public function show($league, $mode = 0, $requestedUser = false)
    {
    	$league = League::where(['name' => $league, 'mode' => $mode])->first();

    	$users = User::where('mode', $mode)->whereBetween('pp_raw', [$league->minpp, $league->maxpp])->orderBy('pp_raw', 'desc')->get();

    	$user_ids = array();
    	foreach($users as $user)
    	{
    		$user_ids[] = $user->user_id;
    	}

    	$scores = Score::with('beatmap')->where('mode', $mode)->whereIn('user_id', $user_ids)->orderBy('pp', 'desc')->take(10)->get();

    	return view('modules.league', [
    		'mode' => $this->formatMode($mode),
    		'league' => $league,
    		'users' => $users,
    		'scores' => $scores,
    		'requestedUser' => $requestedUser
    	]);
    }

    // "To add a function in Laravel you have to edit composer.json and..."
    // Yeah no
    private function formatMode($mode)
    {
    	switch ($mode) {
    		case 0:
    			return 'Standard';
    			break;
    		case 1:
    			return 'Taiko';
    			break;
    		case 2:
    			return 'Catch the Beat';
    			break;
    		case 3;
    			return 'Mania';
    			break;
    		default:
    			return 'Standard';
    			break;
    	}
    }
}
