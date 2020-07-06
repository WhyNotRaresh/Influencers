<?php


namespace App\Repository;


use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\EntityRepository;

class TagRepository extends EntityRepository
{
	public function getByStartOfName(string $name):? array{
		return $this->getEntityManager()
			->createQuery(
				'select a from App\Entity\Tags a where a.tagName like :name'
			)->setParameter('name', $name."%")
			->getResult();
	}
}