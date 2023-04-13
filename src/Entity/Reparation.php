<?php

namespace App\Entity;

use App\Repository\ReparationRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\Collection ;


#[ORM\Entity(repositoryClass: ReparationRepository::class)]
class Reparation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank(message: "Vous devez décrire la panne!!")]
    private ?string $Description_Panne = null;
    #[ORM\OneToMany(mappedBy: 'id_employe', targetEntity: Employee::class,)]
    private Collection $employees;

    #[ORM\Column(length: 255)]
    private ?string $Etat = null;


    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $Date_declaration = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $Date_rep = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $Date_recuperation = null;



    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDescriptionPanne(): ?string
    {
        return $this->Description_Panne;
    }

    public function setDescriptionPanne(string $Description_Panne): self
    {
        $this->Description_Panne = $Description_Panne;

        return $this;
    }

    public function getEtat(): ?string
    {
        return $this->Etat ? 'reparé' : 'non reparé';
    }

    public function setEtat(string $Etat): self
    {
        $this->Etat = $Etat;

        return $this;
    }

    public function getDateRep(): ?\DateTimeInterface
    {
        return $this->Date_rep;
    }

    public function setDateRep(\DateTimeInterface $Date_rep): self
    {
        $this->Date_rep = $Date_rep;

        return $this;
    }

    public function getDateDeclaration(): ?\DateTimeInterface
    {
        return $this->Date_declaration;
    }

    public function setDateDeclaration(\DateTimeInterface $Date_declaration): self
    {
        $this->Date_declaration = $Date_declaration;

        return $this;
    }

    public function getDateRecuperation(): ?\DateTimeInterface
    {
        return $this->Date_recuperation;
    }

    public function setDateRecuperation(\DateTimeInterface $Date_recuperation): self
    {
        $this->Date_recuperation = $Date_recuperation;


        return $this;
    }

    /**
     * @return Collection
     */
    public function getEmployees(): Collection
    {
        return $this->employees;
    }

    /**
     * @param Collection $employees
     */
    public function setEmployees(Collection $employees): void
    {
        $this->employees = $employees;
    }



}
