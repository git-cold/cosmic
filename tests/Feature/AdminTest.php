<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AdminTest extends TestCase
{
    /**
     * A basic feature test example.
     */

    //test de client vers la page gestion stock mais impossible donc rediriger vers page d'accueil
    public function testAdminforClient(): void
    {
        // Créer un utilisateur administrateur
        $client = User::factory()->create(['status' => 'client']);

        // Authentifier l'administrateur
        $this->actingAs($client);

        // Appeler la route
        $response = $this->get('/admin');

        // Vérifier la redirection et le code d'état
        $response->assertStatus(302)->assertRedirect('/');
    }

    //test pour personne non connecté d'essayer d'accéder à la gestion des stocks mais pas possible
    public function testAdminforUser(): void
    {
        // Appeler la route
        $response = $this->get('/admin');

        // Vérifier la redirection et le code d'état
        $response->assertStatus(302)->assertRedirect('/');
    }

    public function testAdminforAdmin()
    {
        $user = User::where('email', "Mondestin@exemple.com")->first();
        $response = $this->actingAs($user)->withSession(['user_status' => "admin"])->get('/admin');

        $response->assertStatus(200);
    }

}


