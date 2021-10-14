<?php

namespace App\Entity;

use App\Repository\PeriodeMensuelleRepository;
use Doctrine\ORM\Mapping as ORM;
use App\Entity\Periode;
use ApiPlatform\Core\Annotation\ApiResource;

/**
 * @ORM\Entity(repositoryClass=PeriodeMensuelleRepository::class)
 * @ApiResource(
 *      collectionOperations={"post"},
 *      itemOperations={"get"}
 * )
 */
class PeriodeMensuelle extends Periode
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
    private $nom;

 
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }
}
