<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProductControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     */

    //Vérifie que le client peut bien voir tous les produits
    public function testTousProduitClient(): void
    {
        // Créer un utilisateur administrateur
        $client = User::factory()->create(['status' => 'client']);

        // Authentifier l'administrateur
        $this->actingAs($client);

        // Appeler la route
        $response = $this->get('/tousProduits');

        // Vérifier la redirection et le code d'état
        $response->assertStatus(200);
    }

    //Vérifie qu'un utilisateur non connecté peut bien voir tous les produits
    public function testTousProduitUser(): void
    {
        // Appeler la route
        $response = $this->get('/tousProduits');

        // Vérifier la redirection et le code d'état
        $response->assertStatus(200);
    }

    //Vérifie que l'administrateur peut bien voir tous les produits
    public function testTousProduitAdmin()
    {
        $user = User::where('email', "Mondestin@exemple.com")->first();
        $response = $this->actingAs($user)->withSession(['user_status' => "admin"])->get('/tousProduits');

        $response->assertStatus(200);
    }

}
