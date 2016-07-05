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
        for ($i=0; $i < 4; $i++)
        {
            // Wood Leagues
            DB::table('leagues')->insert([
                'name'      => 'wood',
                'slug'      => 'Welcome to Oss',
                'division'  => 3,
                'mode'      => $i,
                'minpp'     => 0,
                'maxpp'     => 100
            ]);

            DB::table('leagues')->insert([
                'name'      => 'wood',
                'slug'      => "I don't get it who would ever play this",
                'division'  => 2,
                'mode'      => $i,
                'minpp'     => 100,
                'maxpp'     => 250
            ]);

            DB::table('leagues')->insert([
                'name'      => 'wood',
                'slug'      => "You can use the keyboard?",
                'division'  => 1,
                'mode'      => $i,
                'minpp'     => 250,
                'maxpp'     => 500
            ]);

            // Bronze Leagues
            DB::table('leagues')->insert([
                'name'      => 'bronze',
                'slug'      => 'Congratulations on not quitting!',
                'division'  => 3,
                'mode'      => $i,
                'minpp'     => 500,
                'maxpp'     => 750
            ]);

            DB::table('leagues')->insert([
                'name'      => 'bronze',
                'slug'      => 'TBD',
                'division'  => 2,
                'mode'      => $i,
                'minpp'     => 750,
                'maxpp'     => 1200
            ]);

            DB::table('leagues')->insert([
                'name'      => 'bronze',
                'slug'      => 'TBD',
                'division'  => 1,
                'mode'      => $i,
                'minpp'     => 1200,
                'maxpp'     => 1500
            ]);

            // Silver Leagues
            DB::table('leagues')->insert([
                'name'      => 'silver',
                'slug'      => 'TBD',
                'division'  => 3,
                'mode'      => $i,
                'minpp'     => 1500,
                'maxpp'     => 2000
            ]);

            DB::table('leagues')->insert([
                'name'      => 'silver',
                'slug'      => 'TBD',
                'division'  => 2,
                'mode'      => $i,
                'minpp'     => 1500,
                'maxpp'     => 2400
            ]);

            DB::table('leagues')->insert([
                'name'      => 'silver',
                'slug'      => 'TBD',
                'division'  => 1,
                'mode'      => $i,
                'minpp'     => 2400,
                'maxpp'     => 2800
            ]);

            // Gold Leagues
            DB::table('leagues')->insert([
                'name'      => 'gold',
                'slug'      => 'tbd gold 3',
                'division'  => 3,
                'mode'      => $i,
                'minpp'     => 2800,
                'maxpp'     => 3200
            ]);

            DB::table('leagues')->insert([
                'name'      => 'gold',
                'slug'      => 'TBD 2',
                'division'  => 2,
                'mode'      => $i,
                'minpp'     => 3200,
                'maxpp'     => 3600
            ]);

            DB::table('leagues')->insert([
                'name'      => 'gold',
                'slug'      => 'TBD 1',
                'division'  => 1,
                'mode'      => $i,
                'minpp'     => 3600,
                'maxpp'     => 4000
            ]);
        }
    }
}
