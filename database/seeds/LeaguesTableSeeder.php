<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class LeaguesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Bronze Leagues
        for ($i=0; $i < 4; $i++)
        {
            DB::table('leagues')->insert([
                'name' => 'bronze',
                'slug' => 'Welcome to Oss',
                'mode' => $i,
                'minpp' => 0,
                'maxpp' => 1000
            ]);
        }

        // Silver Leagues
        for ($i=0; $i < 4; $i++)
        {
            DB::table('leagues')->insert([
                'name' => 'silver',
                'slug' => 'Congratulations on not quitting!',
                'mode' => $i,
                'minpp' => 1001,
                'maxpp' => 2000
            ]);
        }

        // Gold Leagues
        for ($i=0; $i < 4; $i++)
        {
            DB::table('leagues')->insert([
                'name' => 'gold',
                'slug' => 'Getting to know the fun',
                'mode' => $i,
                'minpp' => 2001,
                'maxpp' => 3500
            ]);
        }
    }
}
