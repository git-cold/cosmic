<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AuthentificationControllerTest extends TestCase
{
    //admin qui essaye d'aller à la page de connexion sauf que impossible
    public function testLoginPageAdmin() {
        $user = User::where('email', "Mondestin@exemple.com")->first();
        $response = $this->actingAs($user)->withSession(['user_status' => "admin"])->get('/login');
        $response->assertStatus(302)->assertRedirect('/');
    }


    //test pour personne pas connecté qui essaye d'aller à la page login et ça fonctionne
    public function testLoginPageNoConnection() {
        $response = $this->get('/login');
        $response->assertStatus(200);
    }

    //test pour un client qui essaye d'accéder à la page de connexion or impossible car il est déjà connecté
    public function testLoginPageClient() {
        $user = User::where('email', "a@a.com")->first();
        $response = $this->actingAs($user)->withSession(['user_status' => "client"])->get('/login');
        $response->assertStatus(302)->assertRedirect('/');
    }
}
