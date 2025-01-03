<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PublisherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $publishers=\App\Models\Publisher::factory()->count(5)->create();

        foreach($publishers as $publisher){
            
            $user = \App\Models\User::inRandomOrder()->first();

            if($user){
                DB::table('reviews')->insert([
                    'user_id' => $user->id,  
                    'publisher_id' => $publisher->id,
                    'reviewable_type' => 'Publishers',
                    'review' =>  Str::random(10),
                ]);
            }
        }
    }
}
