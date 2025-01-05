<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Publisher;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class PublisherTest extends TestCase
{
    public function test_new_publisher_can_be_added(): void
    {
        $this->withoutMiddleware();
    
        $user = User::factory()->create([
            'name' => 'Test User',
            'email' => 'test21@gmail.com',
            'password' => Hash::make('admin'),
            'is_admin' => true,
        ]); 
    
        $this->actingAs($user);
    
        $publisherInfo = [
            'name' => 'Test Publisher',
            'email' => 'publisher@example.com',
            'address' => 'address test'
        ];

        $response = $this->post('/addPublisher', $publisherInfo);
    
        $this->assertDatabaseHas('publishers', $publisherInfo);
    
        $response->assertRedirect(route('publishers'));
    }

    public function test_update_publisher_can_be_added(): void
    {
        $this->withoutMiddleware();
        
        $user = User::factory()->create([
            'name' => 'Test User',
            'email' => 'test22@gmail.com',
            'password' => Hash::make('admin'),
            'is_admin' => true,
        ]); 

        $publisherInfo = Publisher::create([
            'name' => 'Test Publisher',
            'email' => 'publisher1@example.com',
            'address' => 'address test'
        ]);
            
        $updated = [
            'name' => 'Test Publisher I',
            'email' => 'publisher1@example.com',
            'address' => 'address test'
        ];

        $response = $this
            ->actingAs($user)
            ->put(route('publishers.editIt', $publisherInfo->id), $updated);

        $response
            ->assertSessionHasNoErrors()
            ->assertRedirect('/publishers');

        $publisherInfo->refresh();

        $this->assertSame('Test Publisher I', $publisherInfo->name);
        $this->assertSame('publisher1@example.com', $publisherInfo->email);
        $this->assertSame('address test', $publisherInfo->address);
    }

    public function test_publisher_page_is_displayed(): void
    {    
        $user = User::factory()->create([
            'name' => 'Test User',
            'email' => 'test23@gmail.com',
            'password' => Hash::make('admin'),
            'is_admin' => true,
        ]); 
        
        $response=$this->actingAs($user)->get('/addPublisher');
            
        $response->assertOk();
    }

    public function test_admin_can_delete_an_publisher(): void
    {
        $user = User::factory()->create([
            'name' => 'Test User',
            'email' => 'test24@gmail.com',
            'password' => Hash::make('admin'),
            'is_admin' => true,
        ]);

        $publisherInfo = Publisher::create([
            'name' => 'Test Publisher',
            'email' => 'publisher2@example.com',
            'address' => 'address test'
        ]);

        $response = $this
            ->actingAs($user) 
            ->post(route('publishers.delete', $publisherInfo->id)); 

        $this->assertDatabaseMissing('publishers', [
            'id' => $publisherInfo->id,
            'name' => 'Test Publisher',
            'email' => 'publisher2@example.com',
            'address' => 'address test'
        ]);

        $response->assertRedirect('/publishers');

        $this->assertAuthenticatedAs($user);
    }

}
