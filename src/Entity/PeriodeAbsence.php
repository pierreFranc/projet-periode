<?php

namespace App\Entity;

use App\Repository\PeriodeAbsenceRepository;
use Doctrine\ORM\Mapping as ORM;
use App\Entity\Periode;
use ApiPlatform\Core\Annotation\ApiResource;

/**
 * @ORM\Entity(repositoryClass=AbsenceRepository::class)
 * @ApiResource(
 *      collectionOperations={"post"},
 *      itemOperations={"get"}
 * )
 */
class PeriodeAbsence extends Periode
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    protected $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $motif;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMotif(): ?string
    {
        return $this->motif;
    }

    public function setMotif(string $motif): self
    {
        $this->motif = $motif;

        return $this;
    }
}
