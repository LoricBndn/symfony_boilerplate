<?php

namespace App\Repository;

use App\Entity\Burger;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Burger>
 */
class BurgerRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Burger::class);
    }

    /**
     * Retourne les burgers contenant un ingrédient spécifique
     *
     * @param string $ingredient
     * @return Burger[]
     */
    public function findBurgersWithIngredient(string $ingredient): array
    {
        return $this->createQueryBuilder('b')
            ->leftJoin('b.pain', 'p')
            ->leftJoin('b.garnitures', 'g')
            ->leftJoin('b.sauces', 's')
            ->leftJoin('b.viandes', 'v')
            ->where('LOWER(p.name) LIKE :ingredient')
            ->orWhere('LOWER(g.name) LIKE :ingredient')
            ->orWhere('LOWER(s.name) LIKE :ingredient')
            ->orWhere('LOWER(v.name) LIKE :ingredient')
            ->setParameter('ingredient', '%' . strtolower($ingredient) . '%')
            ->getQuery()
            ->getResult();
    }
}
