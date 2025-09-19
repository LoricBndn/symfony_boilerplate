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
    #[ORM\JoinColumn(nullable: false)]
    private ?Pain $pain = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    private ?Image $image = null;

    /**
     * @var Collection<int, Oignon>
     */
    #[ORM\ManyToMany(targetEntity: Oignon::class, inversedBy: 'burgers')]
    private Collection $oignons;

    /**
     * @var Collection<int, Sauce>
     */
    #[ORM\ManyToMany(targetEntity: Sauce::class, inversedBy: 'burgers')]
    private Collection $sauces;

    /**
     * @var Collection<int, Fromage>
     */
    #[ORM\ManyToMany(targetEntity: Fromage::class, inversedBy: 'burgers')]
    private Collection $fromages;

    /**
     * @var Collection<int, Salade>
     */
    #[ORM\ManyToMany(targetEntity: Salade::class, inversedBy: 'burgers')]
    private Collection $salades;

    /**
     * @var Collection<int, Viande>
     */
    #[ORM\ManyToMany(targetEntity: Viande::class, inversedBy: 'burgers')]
    private Collection $viandes;

    /**
     * @var Collection<int, Poulet>
     */
    #[ORM\ManyToMany(targetEntity: Poulet::class, inversedBy: 'burgers')]
    private Collection $poulets;

    /**
     * @var Collection<int, Bacon>
     */
    #[ORM\ManyToMany(targetEntity: Bacon::class, inversedBy: 'burgers')]
    private Collection $bacons;

    /**
     * @var Collection<int, Tomate>
     */
    #[ORM\ManyToMany(targetEntity: Tomate::class, inversedBy: 'burgers')]
    private Collection $tomates;

    /**
     * @var Collection<int, Poisson>
     */
    #[ORM\ManyToMany(targetEntity: Poisson::class, inversedBy: 'burgers')]
    private Collection $poissons;

    /**
     * @var Collection<int, Oeuf>
     */
    #[ORM\ManyToMany(targetEntity: Oeuf::class, inversedBy: 'burgers')]
    private Collection $oeufs;

    /**
     * @var Collection<int, Cornichon>
     */
    #[ORM\ManyToMany(targetEntity: Cornichon::class, inversedBy: 'burgers')]
    private Collection $cornichons;

    /**
     * @var Collection<int, Commentaire>
     */
    #[ORM\OneToMany(targetEntity: Commentaire::class, mappedBy: 'burger')]
    private Collection $commentaires;

    public function __construct()
    {
        $this->oignons = new ArrayCollection();
        $this->sauces = new ArrayCollection();
        $this->fromages = new ArrayCollection();
        $this->salades = new ArrayCollection();
        $this->viandes = new ArrayCollection();
        $this->poulets = new ArrayCollection();
        $this->bacons = new ArrayCollection();
        $this->tomates = new ArrayCollection();
        $this->poissons = new ArrayCollection();
        $this->oeufs = new ArrayCollection();
        $this->cornichons = new ArrayCollection();
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

    public function getOignons(): Collection { return $this->oignons; }
    public function addOignon(Oignon $oignon): static { if(!$this->oignons->contains($oignon)) $this->oignons->add($oignon); return $this; }
    public function removeOignon(Oignon $oignon): static { $this->oignons->removeElement($oignon); return $this; }

    public function getSauces(): Collection { return $this->sauces; }
    public function addSauce(Sauce $sauce): static { if(!$this->sauces->contains($sauce)) $this->sauces->add($sauce); return $this; }
    public function removeSauce(Sauce $sauce): static { $this->sauces->removeElement($sauce); return $this; }

    public function getFromages(): Collection { return $this->fromages; }
    public function addFromage(Fromage $fromage): static { if(!$this->fromages->contains($fromage)) $this->fromages->add($fromage); return $this; }
    public function removeFromage(Fromage $fromage): static { $this->fromages->removeElement($fromage); return $this; }

    public function getSalades(): Collection { return $this->salades; }
    public function addSalade(Salade $salade): static { if(!$this->salades->contains($salade)) $this->salades->add($salade); return $this; }
    public function removeSalade(Salade $salade): static { $this->salades->removeElement($salade); return $this; }

    public function getViandes(): Collection { return $this->viandes; }
    public function addViande(Viande $viande): static { if(!$this->viandes->contains($viande)) $this->viandes->add($viande); return $this; }
    public function removeViande(Viande $viande): static { $this->viandes->removeElement($viande); return $this; }

    public function getPoulets(): Collection { return $this->poulets; }
    public function addPoulet(Poulet $poulet): static { if(!$this->poulets->contains($poulet)) $this->poulets->add($poulet); return $this; }
    public function removePoulet(Poulet $poulet): static { $this->poulets->removeElement($poulet); return $this; }

    public function getBacons(): Collection { return $this->bacons; }
    public function addBacon(Bacon $bacon): static { if(!$this->bacons->contains($bacon)) $this->bacons->add($bacon); return $this; }
    public function removeBacon(Bacon $bacon): static { $this->bacons->removeElement($bacon); return $this; }

    public function getTomates(): Collection { return $this->tomates; }
    public function addTomate(Tomate $tomate): static { if(!$this->tomates->contains($tomate)) $this->tomates->add($tomate); return $this; }
    public function removeTomate(Tomate $tomate): static { $this->tomates->removeElement($tomate); return $this; }

    public function getPoissons(): Collection { return $this->poissons; }
    public function addPoisson(Poisson $poisson): static { if(!$this->poissons->contains($poisson)) $this->poissons->add($poisson); return $this; }
    public function removePoisson(Poisson $poisson): static { $this->poissons->removeElement($poisson); return $this; }

    public function getOeufs(): Collection { return $this->oeufs; }
    public function addOeuf(Oeuf $oeuf): static { if(!$this->oeufs->contains($oeuf)) $this->oeufs->add($oeuf); return $this; }
    public function removeOeuf(Oeuf $oeuf): static { $this->oeufs->removeElement($oeuf); return $this; }

    public function getCornichons(): Collection { return $this->cornichons; }
    public function addCornichon(Cornichon $cornichon): static { if(!$this->cornichons->contains($cornichon)) $this->cornichons->add($cornichon); return $this; }
    public function removeCornichon(Cornichon $cornichon): static { $this->cornichons->removeElement($cornichon); return $this; }

    public function getCommentaires(): Collection { return $this->commentaires; }
    public function addCommentaire(Commentaire $commentaire): static { if(!$this->commentaires->contains($commentaire)) { $this->commentaires->add($commentaire); $commentaire->setBurger($this); } return $this; }
    public function removeCommentaire(Commentaire $commentaire): static { if($this->commentaires->removeElement($commentaire)) { if($commentaire->getBurger() === $this) { $commentaire->setBurger(null); } } return $this; }
}
