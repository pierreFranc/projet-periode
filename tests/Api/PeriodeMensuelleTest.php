<?php

namespace App\Tests\Api;

use ApiPlatform\Core\Bridge\Symfony\Bundle\Test\ApiTestCase;

class PeriodeMensuelleTest extends ApiTestCase
{
    public function testPostPeriodeMensuelle(): void
    {
        // Test sur un appel avec des arguments correct
        $response = static::createClient()->request('POST', '/api/periode_mensuelles', ['json' => [
            'nom' => 'JANVIER 2021',
            'debut' => '2021-01-01T00:00:00+00:00',
            'fin' => '2021-02-01T00:00:00+00:00',
        ]]);

        $this->assertResponseIsSuccessful();
        

        // Requete qui doit être en écheque car levé d'exception suite à des dates incorrects
        // Date début antérieure à la date de fin
        $response = static::createClient()->request('POST', '/api/periode_absences', ['json' => [
            'nom' => 'JANVIER 2022',
            'debut' => '2022-01-01T00:00:00+00:00',
            'fin' => '2021-02-01T00:00:00+00:00',
        ]]);
        
        $this->assertResponseStatusCodeSame('500');
    }
}
