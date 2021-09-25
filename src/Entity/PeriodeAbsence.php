<?php

namespace App\Entity;

use App\Repository\PeriodeAbsenceRepository;
use Doctrine\ORM\Mapping as ORM;
use App\Entity\Periode;

/**
 * @ORM\Entity(repositoryClass=AbsenceRepository::class)
 */
class PeriodeAbsence extends Periode
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    public function getId(): ?int
    {
        return $this->id;
    }
}
