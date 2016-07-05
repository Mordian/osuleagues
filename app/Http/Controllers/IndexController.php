<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Arielhr\Osuapi;
use App\User;
use App\Score;
use App\Beatmap;
use App\League;

class IndexController extends Controller
{
    public function index()
    {
        return view('modules.index');
    	
    }

    public function placement(Request $request)
    {
        $messages = [
            'required' => 'Baka',
            'numeric' => 'Dude please...',
        ];

        $this->validate($request, [
            'username' => 'required',
            'mode' => 'required|numeric'
        ], $messages);

        $user = User::where([
            'canonical_username' => strtolower($request->username),
            'mode' => $request->mode])
            ->first();

        if (!$user)
        {
            $user = new User();
            $user->findInApi($request->username, $request->mode);
            $user->save();
            $user->getScores();
        }

        $league = $user->getLeague();
        $mode = lcfirst(formatMode($request->mode));
        return redirect(
            'leagues/'.$league->name.'/'.$league->division.'/'.$mode.'/'.$user->canonical_username
        );
    }
}