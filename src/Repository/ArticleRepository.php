<?php


namespace App\Repository;


use App\Entity\Articles;
use Doctrine\ORM\EntityRepository;

class ArticleRepository extends EntityRepository
{
	public function getById($id): Articles {
		return $this->getEntityManager()
			->createQuery(
				'select a from App\Entity\Articles a where a.id = :id'
			)->setParameter('id', $id)
			->getResult()[0];
	}
}