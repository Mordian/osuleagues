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
        $this->validate($request, [
            'username' => 'required',
            'mode' => 'required|numeric'
        ]);


        $user = User::where([
            'canonical_username' => strtolower($request->username),
            'mode' => $request->mode])
            ->first();

        if (!$user)
        {
            // Instantiate and look for the user
            $osu = new Osuapi(env('OSU_API_KEY'));
            $osu_user = $osu->get_user(['u' => $request->username, 'm' => $request->mode]);

            if (!$osu_user)
            {
                abort(404, "Can't find \"" . $request->username . "\" in osu! API.");
            }

            // Assign the api response to our User model
            $osu_user = (array) $osu_user[0];
            
            $user = new User();
            $user->fill($osu_user);
            $user->mode = $request->mode;
            $user->canonical_username = strtolower($osu_user['username']);
            $user->save();

            $user->getScores($osu);
        }

        $league = $user->getLeague();
        return redirect('leagues/'.$league->name.'/'.$request->mode.'/'.$user->canonical_username);
    }
}