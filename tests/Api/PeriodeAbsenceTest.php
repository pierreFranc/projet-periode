<?php

namespace App\Tests\Api;

use ApiPlatform\Core\Bridge\Symfony\Bundle\Test\ApiTestCase;

class PeriodeAbsenceTest extends ApiTestCase
{
    public function testPostPeriodeAbsence(): void
    {
        // Requete qui doit être correcte
        $response = static::createClient()->request('POST', '/api/periode_absences', ['json' => [
            'motif' => 'En formation pour etudier les APIS',
            'debut' => '2021-01-01T00:00:00+00:00',
            'fin' => '2021-10-01T00:00:00+00:00',
        ]]);

        $this->assertResponseIsSuccessful();


        // Requete qui doit être en écheque car levé d'exception suite à des dates incorrects
        // Date début antérieure à la date de fin
        $response = static::createClient()->request('POST', '/api/periode_absences', ['json' => [
            'motif' => 'En formation pour etudier les APIS',
            'debut' => '2021-11-01T00:00:00+00:00',
            'fin' => '2021-10-01T00:00:00+00:00',
        ]]);
        
        $this->assertResponseStatusCodeSame('500');
    }
}
