<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Authors;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AuthorTest extends TestCase
{
    public function test_new_author_can_be_added(): void
    {
        $this->withoutMiddleware();
    
        $user = User::factory()->create([
            'name' => 'Test User',
            'email' => 'test1@gmail.com',
            'password' => Hash::make('admin'),
            'is_admin' => true,
        ]); 
    
        $this->actingAs($user);
    
        $authorInfo = [
            'name' => 'Test Author',
            'email' => 'author@example.com',
        ];

        $response = $this->post('/addAuthor', $authorInfo);
    
        $this->assertDatabaseHas('authors', $authorInfo);
    
        $response->assertRedirect(route('authors'));
    }

    public function test_update_author_can_be_added(): void
    {
        $this->withoutMiddleware();
        
        $user = User::factory()->create([
            'name' => 'Test User',
            'email' => 'test2@gmail.com',
            'password' => Hash::make('admin'),
            'is_admin' => true,
        ]); 

        $authorInfo = Authors::create([
            'name' => 'Test Author',
            'email' => 'author1@example.com',
        ]);
            
        $updated = [
            'name' => 'Test Author Val',  
            'email' => 'author1@example.com',  
        ];

        $response = $this
            ->actingAs($user)
            ->put(route('authors.editIt', $authorInfo->id), $updated);

        $response
            ->assertSessionHasNoErrors()
            ->assertRedirect('/authors');

        $authorInfo->refresh();

        $this->assertSame('Test Author Val', $authorInfo->name);
        $this->assertSame('author1@example.com', $authorInfo->email);
    }

    
    public function test_author_page_is_displayed(): void
    {    
        $user = User::factory()->create([
            'name' => 'Test User',
            'email' => 'test3@gmail.com',
            'password' => Hash::make('admin'),
            'is_admin' => true,
        ]); 
        
        $response=$this->actingAs($user)->get('/addAuthor');
            
        $response->assertOk();
    }

    public function test_admin_can_delete_an_author(): void
    {
        $user = User::factory()->create([
            'name' => 'Test User',
            'email' => 'test4@gmail.com',
            'password' => Hash::make('admin'),
            'is_admin' => true,
        ]);

        $authorInfo = Authors::create([
            'name' => 'Test Author',
            'email' => 'author4@example.com',
        ]);

        $response = $this
            ->actingAs($user) 
            ->post(route('authors.delete', $authorInfo->id)); 

        $this->assertDatabaseMissing('authors', [
            'id' => $authorInfo->id,
            'name' => 'Test Author',
            'email' => 'author4@example.com',
        ]);

        $response->assertRedirect('/authors');

        $this->assertAuthenticatedAs($user);
    }

}
