<?php

namespace Tests\Feature;

use App\Models\Document;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class DocumentApiAcessTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_can_index(): void
    {
        $response = $this->get(
            '/api/documents',
            [
                'User' => 'application/json',
            ]
        );
        $response->assertStatus(200);

        $user = Document::create([
            'name' => 'admin',
            'email' => Str::random(8),
            'password' => '123',
            'department_id' => '1',
            
        ]);
        $token = $user->createToken('test_negativo', ['aaaa']);
        $plainTextToken = $token->plainTextToken;

        $response = $this->get(
            '/api/documents',
            [
                'Accept' => 'application/json',
                'Authorization' => 'Bearer ' . $plainTextToken
            ]
        );
        $response->assertStatus(403);
    }

    public function test_ok()
    {
        $user = Document::create([
            'name' => 'admin',
            'email' => Str::random(8),
            'password' => '123',
            'department_id' => '1',
        ]);
        $token = $user->createToken('test_positivo', ['documents:list']);
        $plainTextToken = $token->plainTextToken;
        $response = $this->get(
            '/api/documents',
            [
                'Accept' => 'application/json',
                'Authorization' => 'Bearer ' . $plainTextToken
            ]
        );
        $response->assertStatus(403);
    }





}
