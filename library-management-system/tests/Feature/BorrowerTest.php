<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\Book;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class BorrowerTest extends TestCase
{
    public function test_book_borrow(): void
    {
        $this->withoutMiddleware();
    
        $user = User::factory()->create([
            'name' => 'Test User',
            'email' => 'test61@gmail.com',
            'password' => Hash::make('test')
        ]); 
    
        $this->actingAs($user);

        $books=Book::factory()->create();
    
        $borrower = [
            'book_id'=>$books->id,
            'user_id'=>$user->id,
            'borrowed_at'=>now()->format('Y-m-d H:i:s'),
        ];

        $response = $this->get('/borrow/' . $books->id);
    
        $this->assertDatabaseHas('borrowers', $borrower);
    
        $response->assertRedirect(route('/'));
    }

    public function test_book_return(): void
    {
        $this->withoutMiddleware();
    
        $user = User::factory()->create([
            'name' => 'Test User',
            'email' => 'test62@gmail.com',
            'password' => Hash::make('test')
        ]); 
    
        $this->actingAs($user);

        $books=Book::factory()->create();
    
        $borrower = [
            'book_id'=>$books->id,
            'user_id'=>$user->id,
            'borrowed_at'=>now()->format('Y-m-d H:i:s'),
            'returned_at'=>now()->format('Y-m-d H:i:s'),
        ];

        $this->get('/borrow/' . $books->id);

        $response = $this->get('/return/' . $books->id);
    
        $this->assertDatabaseHas('borrowers', $borrower);
    
        $response->assertRedirect(route('/'));
    }
}
