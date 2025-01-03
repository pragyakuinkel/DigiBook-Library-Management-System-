<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class AuthorsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $authors=\App\Models\Authors::factory()->count(20)->create();

        foreach($authors as $author){
            
            $user = \App\Models\User::inRandomOrder()->first();

            if($user){
                DB::table('reviews')->insert([
                    'user_id' => $user->id,  
                    'author_id' => $author->id,
                    'reviewable_type' => 'Authors',
                    'review' =>  Str::random(10),
                ]);
            }
        }
    }
}
