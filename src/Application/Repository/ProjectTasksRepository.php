<?php

namespace Application\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * ProjectTasksRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class ProjectTasksRepository extends EntityRepository
{

	public function getTaksList($userId, $projectId)
	{
		$connection = $this->_em->createQueryBuilder();

		$connection->select('t')
				->from('Application\\Entity\\ProjectTasks','t')
				->innerJoin('t.project','p')
				->innerJoin('t.user','u')
				->where('u.userId = :UID')
				->andWhere('p.projectId = :PID')
				->setParameters(array(
					'UID'=>$userId,
					'PID'=>$projectId
				));

		return $connection->getQuery()->getArrayResult();

	}

}
