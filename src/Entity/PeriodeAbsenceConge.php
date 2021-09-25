<?php

namespace App\Entity;

use App\Repository\PeriodeAbsenceCongeRepository;
use Doctrine\ORM\Mapping as ORM;
use App\Entity\PeriodeAbsence;

/**
 * @ORM\Entity(repositoryClass=PeriodeAbsenceCongeRepository::class)
 */
class PeriodeAbsenceConge extends PeriodeAbsence
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
