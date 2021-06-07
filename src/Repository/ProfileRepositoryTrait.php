<?php

namespace App\Repository;

use App\Entity\User;

// Un trait est un ensemble de variables ou de fonctions
// qui peuvent être importées dans une classe.
// La différence avec une classe, c'est que quand un trait
// est importé, la classe n'est pas du type du trait.
// Autrement dit, un objet ne peut pas être de type trait,
// alors qu'il peut être d'un type d'un classe qu'il étend.
Trait ProfileRepositoryTrait
{
    /**
     * Cette fonction permet de récupérer un profil à partir d'un user
     * 
     * @return App\Entity\Client|App\Entity\Student|App\Entity\Teacher
     */
    public function findOneByUser(User $user)
    {
        // p comme profil
        return $this->createQueryBuilder('p')
            ->andWhere('p.user = :user')
            ->setParameter('user', $user)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
}
