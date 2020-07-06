<?php


namespace App\Repository;


use App\Entity\Authors;
use Doctrine\ORM\EntityRepository;

class AuthorRepository extends EntityRepository
{
    public function getByMail(string $mail):? Authors{
	    $result = $this->getEntityManager()
			    ->createQuery(
				    'select a from App\Entity\Authors a where a.mail = :mail'
			    )->setParameter('mail', $mail)
			    ->getResult();

	    if ($result != null) return $result[0];
	    return null;
    }

	public function getByName(string $name):? Authors{
		$result = $this->getEntityManager()
			->createQuery(
				'select a from App\Entity\Authors a where a.name = :name'
			)->setParameter('name', $name)
			->getResult();

		if ($result != null) return $result[0];
		return null;
	}
}