<?php

namespace App\Tests\Api;

use ApiPlatform\Core\Bridge\Symfony\Bundle\Test\ApiTestCase;

class PeriodeMensuelleApiTest extends ApiTestCase
{
    public function testPostPeriodeMensuelleApi(): void
    {
        // Création d'une période
        $response = static::createClient()->request('POST', '/api/periode_mensuelle_apis', ['json' => [
            'nom' => 'JANVIER 2021',
            'dateDebut' => '2021-01-01T00:00:00+00:00',
            'dateFin' => '2021-02-01T00:00:00+00:00',
        ]]);

        
        //$data = json_decode($response->getContent());

        $this->assertResponseIsSuccessful();
        
    }
}
