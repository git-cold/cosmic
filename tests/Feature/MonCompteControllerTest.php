<?php

namespace Tests\Feature;

use App\Models\Client;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class MonCompteControllerTest extends TestCase
{
    //administrateur qui essaye d'arriver à son compte mais impossible car pas de compte pour l'admin donc redirection page d'accueil
    public function testmonCompteAdmin() {
        $user = User::where('email', "Mondestin@exemple.com")->first();
        $response = $this->actingAs($user)->withSession(['user_status' => "admin"])->get('/monCompte');

        $response->assertStatus(302);
    }



    //personne pas connecté qui essaye d'aller à la page monCompte mais impossible car pas connecté donc renvoyé à la page login
    public function testmonCompteGuest() {
        $response = $this->get('/monCompte');

        $response->assertStatus(302)->assertRedirect('/login');
    }
}
