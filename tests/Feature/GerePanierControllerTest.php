<?php

namespace Tests\Feature;

use App\Models\Client;
use App\Models\Panier;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class GerePanierControllerTest extends TestCase
{

    //test admin qui ne peut pas aller sur le panier car il est admin donc rediriger page d'accueil
    public function testPanierAdmin()
    {
        $user = User::where('email', "Mondestin@exemple.com")->first();
        $response = $this->actingAs($user)->withSession(['user_status' => "admin"])->get('/panier/1');
        $response->assertStatus(302);
    }


    //test utilisateur pas connecté essayant d'aller au panier, pas possible il est envoyé vers la page de connexion
    public function testPanierPageGuest() {
        $response = $this->get('/panier/1');

        $response->assertStatus(302)->assertRedirect('/login');
    }

}
