<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use App\League;

class IndexController extends Controller
{
    public function index()
    {
        $leagues = League::get();
        return view('modules.index', [
            'leagues' => $leagues
        ]);
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
            if (!$user->findInApi($request->username, $request->mode))
            {
                abort(404, "Can't find \"" . $request->username . "\" in osu! API. Did you type it right?");
            }
            
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