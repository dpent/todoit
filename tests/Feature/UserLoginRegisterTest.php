<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserLoginRegisterTest extends TestCase
{

    use RefreshDatabase;
    /**
     * A basic feature test example.
     */
    public function test_login(): void
    {
        $user = User::create([
            'first_name' => 'John',
            'last_name' => 'Doe',
            'username' => 'johndoe',
            'email' => 'jd@example.com',
            'password' => Hash::make('1234'),
        ]);

        $response = $this->post('/login',[
            'email' => $user->email,
            'password' => '1234',
        ]);

        $this->assertAuthenticatedAs($user);

        $response->assertRedirect('/loggedIn');

    }

    public function test_logout(): void{

        $user = User::factory()->create();

        $this->actingAs($user);

        $response = $this->post('/logout');

        $this->assertGuest();

        $response->assertRedirect('/');


    }

    public function test_register(): void{

        $user=[
            'first_name' => 'John',
            'last_name' => 'Doe',
            'username' => 'johndoe',
            'email' => 'jb@example.com',
            'password' => '1234',
        ];

        $response =$this ->post('/signup',$user);
        $response->assertRedirect('/loggedIn');
        $this->assertDatabaseHas('users',[
            'first_name' => 'John',
            'last_name' => 'Doe',
            'username' => 'johndoe',
        ]);
    }
}
