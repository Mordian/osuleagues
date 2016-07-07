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
                'slug'      => 'I bet my friends would be impressed',
                'division'  => 2,
                'mode'      => $i,
                'minpp'     => 750,
                'maxpp'     => 1200
            ]);

            DB::table('leagues')->insert([
                'name'      => 'bronze',
                'slug'      => "I can't progress without a tablet",
                'division'  => 1,
                'mode'      => $i,
                'minpp'     => 1200,
                'maxpp'     => 1500
            ]);

            // Silver Leagues
            DB::table('leagues')->insert([
                'name'      => 'silver',
                'slug'      => 'Getting to know the fun',
                'division'  => 3,
                'mode'      => $i,
                'minpp'     => 1500,
                'maxpp'     => 2000
            ]);

            DB::table('leagues')->insert([
                'name'      => 'silver',
                'slug'      => "It's this skin that makes me play bad",
                'division'  => 2,
                'mode'      => $i,
                'minpp'     => 2000,
                'maxpp'     => 2400
            ]);

            DB::table('leagues')->insert([
                'name'      => 'silver',
                'slug'      => 'Getting to know the pain',
                'division'  => 1,
                'mode'      => $i,
                'minpp'     => 2400,
                'maxpp'     => 2800
            ]);

            // Gold Leagues
            DB::table('leagues')->insert([
                'name'      => 'gold',
                'slug'      => 'Improve a score, lose 100 ranks',
                'division'  => 3,
                'mode'      => $i,
                'minpp'     => 2800,
                'maxpp'     => 3200
            ]);

            DB::table('leagues')->insert([
                'name'      => 'gold',
                'slug'      => 'Practice more',
                'division'  => 2,
                'mode'      => $i,
                'minpp'     => 3200,
                'maxpp'     => 3600
            ]);

            DB::table('leagues')->insert([
                'name'      => 'gold',
                'slug'      => "Being average never felt this scrub",
                'division'  => 1,
                'mode'      => $i,
                'minpp'     => 3600,
                'maxpp'     => 4000
            ]);

            // Platinum leagues
            DB::table('leagues')->insert([
                'name'      => 'platinum',
                'slug'      => "Being scrub never felt this average",
                'division'  => 3,
                'mode'      => $i,
                'minpp'     => 4000,
                'maxpp'     => 4500
            ]);

            DB::table('leagues')->insert([
                'name'      => 'platinum',
                'slug'      => "The more anime you watch the better you play",
                'division'  => 2,
                'mode'      => $i,
                'minpp'     => 4500,
                'maxpp'     => 5000
            ]);

            DB::table('leagues')->insert([
                'name'      => 'platinum',
                'slug'      => "This is the real mark for average",
                'division'  => 1,
                'mode'      => $i,
                'minpp'     => 5000,
                'maxpp'     => 5500
            ]);

            // Master leagues
            DB::table('leagues')->insert([
                'name'      => 'master',
                'slug'      => "Finally a Shisho",
                'division'  => 3,
                'mode'      => $i,
                'minpp'     => 5500,
                'maxpp'     => 6000
            ]);

            DB::table('leagues')->insert([
                'name'      => 'master',
                'slug'      => "If you come up with something funny let me now",
                'division'  => 2,
                'mode'      => $i,
                'minpp'     => 6000,
                'maxpp'     => 6500
            ]);


            DB::table('leagues')->insert([
                'name'      => 'master',
                'slug'      => "I can actually pick up girls with these mad skills",
                'division'  => 1,
                'mode'      => $i,
                'minpp'     => 6500,
                'maxpp'     => 7000
            ]);

            // Challenger leagues
            DB::table('leagues')->insert([
                'name'      => 'challenger',
                'slug'      => "Challanger what?",
                'division'  => 3,
                'mode'      => $i,
                'minpp'     => 7000,
                'maxpp'     => 7500
            ]);

            DB::table('leagues')->insert([
                'name'      => 'challenger',
                'slug'      => "Blue Dragon's old schoolers",
                'division'  => 2,
                'mode'      => $i,
                'minpp'     => 7500,
                'maxpp'     => 8000
            ]);

            DB::table('leagues')->insert([
                'name'      => 'challenger',
                'slug'      => "rrtyui's game enjoyers",
                'division'  => 1,
                'mode'      => $i,
                'minpp'     => 8000,
                'maxpp'     => 8500
            ]);

            // Major
            DB::table('leagues')->insert([
                'name'      => 'major',
                'slug'      => "End of the line",
                'division'  => 1,
                'mode'      => $i,
                'minpp'     => 8500,
                'maxpp'     => 99999
            ]);
        }
    }
}
