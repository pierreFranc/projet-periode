<?php

namespace App\Entity;

use App\Repository\PeriodeRepository;
use Doctrine\ORM\Mapping as ORM;
use Exception;

/**
 * @ORM\Entity(repositoryClass=PeriodeRepository::class)
 * @ORM\InheritanceType("SINGLE_TABLE")
 * @ORM\DiscriminatorColumn(name="type", type="string")
 * @ORM\DiscriminatorMap(
 * {
 *      "mensuelle" = "PeriodeMensuelle", 
 *      "absence" = "PeriodeAbsence",
 *      "conge" = "PeriodeAbsenceConge",
 * })
 */
class Periode
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    protected $id;

    /**
     * @ORM\Column(type="datetime")
     */
    private $debut;

    /**
     * @ORM\Column(type="datetime")
     */
    private $fin;


    /**
     * Constructeur de Periode
     *
     * @param \DateTimeInterface  $debut    Debut de la période
     * @param \DateTimeInterface  $fin       Fin de la période
     */
    public function __construct(\DateTimeInterface $debut, \DateTimeInterface $fin)
    {
        if ($debut < $fin) {
            $this->debut = $debut;
            $this->fin = $fin;
        } else {
            $message = sprintf("Période date debut: %s - date fin : %s n'est pas valide. La date de fin ne peut pas être antérieure à la date de début", $debut->format('Y-m-d H:i'), $fin->format('Y-m-d H:i'));
            throw new Exception($message);
        }
    }

    /**
     *  Test si la periode passée en parametre est inculse en tout ou partie
     *
     * @param \Periode $periode   La période dont on veut savoir si elle a une inclusion
     *
     * @return bool     Le résultat
     *
     */
    public function isInclusDansPeriode(Periode $periode): bool
    {
        // La période est incluse dans la péirodeMensuelle
        // si son début précède la fin de la périodeMensuelle
        // et si sa fin est audelà du début de la périodeMensuelle
        return
            $periode->getDebut() < $this->getFin() &&
            $periode->getFin() > $this->getDebut();
    }


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDebut(): ?\DateTimeInterface
    {
        return $this->debut;
    }

    public function setDebut(\DateTimeInterface $debut): self
    {
        $this->debut = $debut;

        return $this;
    }

    public function getFin(): ?\DateTimeInterface
    {
        return $this->fin;
    }

    public function setFin(\DateTimeInterface $fin): self
    {
        $this->fin = $fin;

        return $this;
    }
}
