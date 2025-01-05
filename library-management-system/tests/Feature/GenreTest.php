<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Genre;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class GenreTest extends TestCase
{
    public function test_new_genre_can_be_added(): void
    {
        $this->withoutMiddleware();
    
        $user = User::factory()->create([
            'name' => 'Test User',
            'email' => 'test10@gmail.com',
            'password' => Hash::make('admin'),
            'is_admin' => true,
        ]); 
    
        $this->actingAs($user);
    
        $genreInfo = [
            'name' => 'Test Genre',
        ];

        $response = $this->post('/addGenre', $genreInfo);
    
        $this->assertDatabaseHas('genres', $genreInfo);
    
        $response->assertRedirect(route('genre'));
    }

    public function test_update_genre_can_be_added(): void
    {
        $this->withoutMiddleware();
        
        $user = User::factory()->create([
            'name' => 'Test User',
            'email' => 'test12@gmail.com',
            'password' => Hash::make('admin'),
            'is_admin' => true,
        ]); 

        $genreInfo = Genre::create([
            'name' => 'Test Genre I',
        ]);
            
        $updated = [
            'name' => 'Test Genre II'
        ];

        $response = $this
            ->actingAs($user)
            ->put(route('genre.editIt', $genreInfo->id), $updated);

        $response
            ->assertSessionHasNoErrors()
            ->assertRedirect('/genre');

        $genreInfo->refresh();

        $this->assertSame('Test Genre II', $genreInfo->name);
    }

    
    public function test_genre_page_is_displayed(): void
    {    
        $user = User::factory()->create([
            'name' => 'Test User',
            'email' => 'test13@gmail.com',
            'password' => Hash::make('admin'),
            'is_admin' => true,
        ]); 
        
        $response=$this->actingAs($user)->get('/genre');
            
        $response->assertOk();
    }

    public function test_admin_can_delete_a_genre(): void
    {
        $user = User::factory()->create([
            'name' => 'Test User',
            'email' => 'test14@gmail.com',
            'password' => Hash::make('admin'),
            'is_admin' => true,
        ]);

        $genreInfo = Genre::create([
            'name' => 'Test Genre III',
        ]);

        $response = $this
            ->actingAs($user) 
            ->post(route('genre.delete', $genreInfo->id)); 

        $this->assertDatabaseMissing('genres', [
            'id' => $genreInfo->id,
            'name' => 'Test Genre',
        ]);

        $response->assertRedirect('/genre');

        $this->assertAuthenticatedAs($user);
    }

}
