<?php

namespace TheEvnt\LibraryBundle\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * BookRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class BookRepository extends EntityRepository
{
	public function findBooksBeforeYear ($year) {
		$query =  $this->createQueryBuilder('b')
            -> where('b.year < :year')
            -> setParameter('year', $year)
            -> getQuery();
            
        return $query->getResult();
	}
}