<?php

namespace App\Entity;

use App\Repository\BurgerRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BurgerRepository::class)]
class Burger
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 5, scale: 2)]
    private ?string $price = null;

    #[ORM\ManyToOne(inversedBy: 'burgers')]
    #[ORM\JoinColumn(nullable: true)]
    private ?Pain $pain = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    private ?Image $image = null;

    /**
     * @var Collection<int, Sauce>
     */
    #[ORM\ManyToMany(targetEntity: Sauce::class, inversedBy: 'burgers')]
    private Collection $sauces;

    /**
     * @var Collection<int, Viande>
     */
    #[ORM\ManyToMany(targetEntity: Viande::class, inversedBy: 'burgers')]
    private Collection $viandes;

    /**
     * @var Collection<int, Garniture>
     */
    #[ORM\ManyToMany(targetEntity: Garniture::class, inversedBy: 'burgers')]
    private Collection $garnitures;

    /**
     * @var Collection<int, Commentaire>
     */
    #[ORM\OneToMany(targetEntity: Commentaire::class, mappedBy: 'burger')]
    private Collection $commentaires;

    public function __construct()
    {
        $this->sauces = new ArrayCollection();
        $this->viandes = new ArrayCollection();
        $this->garnitures = new ArrayCollection();
        $this->commentaires = new ArrayCollection();
    }

    // Getters et setters pour tous les attributs

    public function getId(): ?int { return $this->id; }
    public function getName(): ?string { return $this->name; }
    public function setName(string $name): static { $this->name = $name; return $this; }
    public function getPrice(): ?string { return $this->price; }
    public function setPrice(string $price): static { $this->price = $price; return $this; }
    public function getPain(): ?Pain { return $this->pain; }
    public function setPain(?Pain $pain): static { $this->pain = $pain; return $this; }
    public function getImage(): ?Image { return $this->image; }
    public function setImage(?Image $image): static { $this->image = $image; return $this; }

    public function getSauces(): Collection { return $this->sauces; }
    public function addSauce(Sauce $sauce): static { if(!$this->sauces->contains($sauce)) $this->sauces->add($sauce); return $this; }
    public function removeSauce(Sauce $sauce): static { $this->sauces->removeElement($sauce); return $this; }

    public function getViandes(): Collection { return $this->viandes; }
    public function addViande(Viande $viande): static { if(!$this->viandes->contains($viande)) $this->viandes->add($viande); return $this; }
    public function removeViande(Viande $viande): static { $this->viandes->removeElement($viande); return $this; }

    public function getGarnitures(): Collection { return $this->garnitures; }
    public function addGarniture(Garniture $garniture): static { if(!$this->garnitures->contains($garniture)) $this->garnitures->add(element: $garniture); return $this; }
    public function removeGarniture(Garniture $garniture): static { $this->garnitures->removeElement($garniture); return $this; }

    public function getCommentaires(): Collection { return $this->commentaires; }
    public function addCommentaire(Commentaire $commentaire): static { if(!$this->commentaires->contains($commentaire)) { $this->commentaires->add($commentaire); $commentaire->setBurger($this); } return $this; }
    public function removeCommentaire(Commentaire $commentaire): static { if($this->commentaires->removeElement($commentaire)) { if($commentaire->getBurger() === $this) { $commentaire->setBurger(null); } } return $this; }
}
