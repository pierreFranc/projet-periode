<?php

namespace App\Tests\Entity;

use PHPUnit\Framework\TestCase;
use App\Entity\PeriodeMensuelle;
use App\Entity\Periode;

class PeriodeMensuelleTest extends TestCase
{
    // Fonction de conversion de string en DateTime
    private function createDateTime(string $strDate): \DateTime
    {
        // Format de date pour la fabrique de DateTime
        $dateFormat = "Y-m-d H:i";

        return \DateTime::createFromFormat($dateFormat, $strDate);
    }

    // Fonction de fabrication de PeriodeAbsence à partir de dateDebut et dateFin au format string
    private function createPeriode(string $strDateDebut, string $strDateFin)
    {   
        return new Periode( $this->createDateTime($strDateDebut), $this->createDateTime($strDateFin));
    }

    public function testIsInclusDansPeriode(): void
    {
        // Création de la période mensuelle basée sur le Mois de Février
        $debutPeriodeMensuelle = $this->createDateTime("2021-02-01 00:00");
        $finPeriodeMensuelle = $this->createDateTime("2021-03-01 00:00"); 
        $periodeMensuelle = new PeriodeMensuelle($debutPeriodeMensuelle, $finPeriodeMensuelle);

        // Tests des cas possibles pour lesquels il n'y à pas d'inclusion
        $assertMessage = "Cas de periode strictement avant periodeMensuelle" ; 
        $periode = $this->createPeriode("2021-01-01 00:00", "2021-01-15 00:00");
        $this->assertFalse($periodeMensuelle->isInclusDansPeriode($periode), $assertMessage);

        $assertMessage = "Cas de periode strictement après periodeMensuelle" ; 
        $periode = $this->createPeriode("2021-04-01 00:00", "2021-04-15 00:00");
        $this->assertFalse($periodeMensuelle->isInclusDansPeriode($periode), $assertMessage);

        $assertMessage = "Cas de periode dont la fin est égale au début de la périodeMensuelle" ; 
        $periode = $this->createPeriode("2021-01-01 00:00", "2021-02-01 00:00");
        $this->assertFalse($periodeMensuelle->isInclusDansPeriode($periode), $assertMessage);

        $assertMessage = "Cas de periode dont la début est égale à la fin de la périodeMensuelle" ; 
        $periode = $this->createPeriode("2021-03-01 00:00", "2021-04-01 00:00");
        $this->assertFalse($periodeMensuelle->isInclusDansPeriode($periode), $assertMessage);

        // Tests des cas possible pour lesquels il y a inclusion totale ou partielle
        $assertMessage = "Cas de periode égale à la periodeMensuelle" ; 
        $periode = $this->createPeriode("2021-02-01 00:00", "2021-03-01 00:00");
        $this->assertTrue($periodeMensuelle->isInclusDansPeriode($periode), $assertMessage);

        $assertMessage = "Cas de periode strictement dans la periodeMensuelle" ; 
        $periode = $this->createPeriode("2021-02-10 00:00", "2021-02-20 00:00");
        $this->assertTrue($periodeMensuelle->isInclusDansPeriode($periode), $assertMessage);

        $assertMessage = "Cas de periode englobant la periodeMensuelle" ; 
        $periode = $this->createPeriode("2021-01-01 00:00", "2021-08-01 00:00");
        $this->assertTrue($periodeMensuelle->isInclusDansPeriode($periode), $assertMessage);

        $assertMessage = "Cas de periode chevauchant par le début la periodeMensuelle" ; 
        $periode = $this->createPeriode("2021-01-01 00:00", "2021-02-10 00:00");
        $this->assertTrue($periodeMensuelle->isInclusDansPeriode($periode), $assertMessage);

        $assertMessage = "Cas de periode chevauchant par la fin la periodeMensuelle" ; 
        $periode = $this->createPeriode("2021-02-10 00:00", "2021-04-10 00:00");
        $this->assertTrue($periodeMensuelle->isInclusDansPeriode($periode), $assertMessage);
    }
}
