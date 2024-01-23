<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use Illuminate\Support\Str;

class UserApiAcessTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }




/********************************************************
 * 
 */



    /**
     * A basic feature test example.
     */
    public function test_can_index(): void
    {
        $response = $this->get(
            '/api/users',
            [
                'User' => 'application/json',
            ]
        );
        $response->assertStatus(200);

        $user = User::create([
            'name' => 'admin',
            'email' => Str::random(8),
            'password' => '123',
            'department_id' => '1',
            
        ]);
        $token = $user->createToken('test_negativo', ['aaaa']);
        $plainTextToken = $token->plainTextToken;

        $response = $this->get(
            '/api/users',
            [
                'Accept' => 'application/json',
                'Authorization' => 'Bearer ' . $plainTextToken
            ]
        );
        $response->assertStatus(200);
    }

    public function test_ok()
    {
        $user = User::create([
            'name' => 'admin',
            'email' => Str::random(8),
            'password' => '123',
            'department_id' => '1',
        ]);
        $token = $user->createToken('test_positivo', ['users:list']);
        $plainTextToken = $token->plainTextToken;
        $response = $this->get(
            '/api/users',
            [
                'Accept' => 'application/json',
                'Authorization' => 'Bearer ' . $plainTextToken
            ]
        );
        $response->assertStatus(200);
    }


}
