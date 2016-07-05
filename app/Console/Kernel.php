<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use App\User;
use Log;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        // Commands\Inspire::class,
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')
        //          ->hourly();

        $schedule->call(function() {
            Log::info('Executing the CRON job');
            $users = User::get();

            foreach ($users as $user)
            {
                $oldPp = $user->pp_raw;

                $user->findInApi($user->username, $user->mode);

                // If PP is the same then we can skip looking for new scores
                if ($oldPp == $user->pp_raw)
                {
                    $user->update();
                    break;
                } else {
                    $user->update();
                    $user->getScores();
                }
            }
        });
    }
}
