<?php


namespace App\Repository;


use App\Entity\Tags;
use Doctrine\Common\Collections\ArrayCollection;
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

	public function getAllById(ArrayCollection $list): ?array {
		$arr = array();
		foreach ($list as $tag) {
			$arr[] = $this->getEntityManager()
				->createQuery(
					'select a from App\Entity\Tags a where a.id = :id'
				)->setParameter('id', $tag->getId())
				->getResult()[0];
		}

		return $arr;
	}
}