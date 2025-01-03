<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $books=\App\Models\Book::factory()->count(5)->create();

        foreach($books as $book){

            $authors = \App\Models\Authors::inRandomOrder()->take(2)->get();

            $genres = \App\Models\Genre::inRandomOrder()->take(2)->get();
            
            // put info in books_authors
            $book->authors()->attach($authors); 
            
            // put info in books_genres
            $book->genres()->attach($genres); 
            
            $user = \App\Models\User::inRandomOrder()->first();

            if($user){
                DB::table('reviews')->insert([
                    'user_id' => $user->id,  
                    'book_id' => $book->id,
                    'reviewable_type' => 'Books',
                    'review' =>  Str::random(10),
                ]);

                DB::table('borrowers')->insert([
                    'user_id' => $user->id,  
                    'book_id' => $book->id,
                    'borrowed_at' => now(),
                    'returned_at' => now(),
                ]);
                
                DB::table('reviews')->insert([
                    'user_id' => $user->id,  
                    'publisher_id' => $book->publication,
                    'reviewable_type' => 'Publishers',
                    'review' =>  Str::random(10),
                ]);
            }
        }

    }
}
