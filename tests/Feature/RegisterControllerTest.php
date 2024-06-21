<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RegisterControllerTest extends TestCase
{
    //vérifie que l'administrateur ne peut pas aller sur l'inscription et rediriger page d'accueil
    public function testRegisterPageAdmin() {
        $user = User::where('email', "Mondestin@exemple.com")->first();
        $response = $this->actingAs($user)->withSession(['user_status' => "admin"])->get('/register');

        $response->assertStatus(302)->assertRedirect('/');
    }
    //vérifie que le client ne peut pas aller sur l'inscription et rediriger page d'accueil
    public function testRegisterPageClient() {
        $user = User::factory()->create();
        $response = $this->actingAs($user)->get('/register');

        $response->assertStatus(302);
    }

    //vérifie qu'une personne non connecté peut bien aller vers la page d'inscription
    public function testRegisterPageGuest() {
        $response = $this->get('/register');

        $response->assertStatus(200);
    }
}
