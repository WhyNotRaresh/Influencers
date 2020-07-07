<?php


namespace App\Repository;


use App\Entity\Articles;
use Doctrine\ORM\EntityRepository;

class ArticleRepository extends EntityRepository
{
	public function getById($id): Articles {
		return $this->getEntityManager()
			->createQuery(
				'select a from App\Entity\Articles a where a.id = :artID'
			)->setParameter('artID', $id)
			->getResult()[0];
	}

	public function getByAuthorId($id) {
		return $this->getEntityManager()
			->createQuery(
				'select a from App\Entity\Articles a where a.author = :authID'
			)->setParameter('authID', $id)
			->getResult();
	}
}