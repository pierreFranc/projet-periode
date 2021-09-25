<?php

namespace App\Entity;

use App\Repository\PeriodeMensuelleRepository;
use Doctrine\ORM\Mapping as ORM;
use App\Entity\Periode;

/**
 * @ORM\Entity(repositoryClass=PeriodeMensuelleRepository::class)
 */
class PeriodeMensuelle extends Periode
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
