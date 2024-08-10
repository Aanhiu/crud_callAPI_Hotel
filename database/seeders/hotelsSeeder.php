<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class hotelsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $fake = Faker::create();
        foreach(range(1 , 10) as $index){
            DB::table('hotels')->insert([
                //id	name	image	location	rating	description
                'name'=>$fake->word,
                'image'=> '...',
                'location'=>$fake->word,
                'rating'=>$fake->numberBetween(10 , 2),
                'description'=>$fake->word,
            ]);
        }

    }
}
