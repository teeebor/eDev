<?php

namespace Application\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * ProjectListRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class ProjectListRepository extends EntityRepository
{

	public function getProjectsForUser($userID){
		$connection = $this->_em->createQueryBuilder();

		$connection->select('p.projectId, p.projectName')
				->from('Application\\Entity\\ProjectUserMap','m')
				->innerJoin('m.project', 'p')
				->innerJoin('m.user','u')
				->where('u.userId = :UID')
				->setParameter('UID',$userID)
				->orderBy('p.ordering','ASC')
				->addOrderBy('p.projectId','ASC');
		return $connection->getQuery()->getArrayResult();
	}

}
