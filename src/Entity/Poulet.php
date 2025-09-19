<?php

namespace App\Entity;

use App\Repository\PouletRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PouletRepository::class)]
class Poulet
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    /**
     * @var Collection<int, Burger>
     */
    #[ORM\ManyToMany(targetEntity: Burger::class, mappedBy: 'poulets')]
    private Collection $burgers;

    public function __construct()
    {
        $this->burgers = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return Collection<int, Burger>
     */
    public function getBurgers(): Collection
    {
        return $this->burgers;
    }

    public function addBurger(Burger $burger): static
    {
        if (!$this->burgers->contains($burger)) {
            $this->burgers->add($burger);
            $burger->addPoulet($this);
        }

        return $this;
    }

    public function removeBurger(Burger $burger): static
    {
        if ($this->burgers->removeElement($burger)) {
            $burger->removePoulet($this);
        }

        return $this;
    }
}
