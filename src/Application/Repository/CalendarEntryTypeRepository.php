<?php

namespace Application\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * CalendarEntryTypeRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class CalendarEntryTypeRepository extends EntityRepository
{
	public function getList(){
		$connection = $this->_em->createQueryBuilder();
		$connection->select('t.entryName, t.entryTypeId')
			->from('Application\\Entity\\CalendarEntryType','t')
			->orderBy('t.entryName','ASC');
		return $connection->getQuery()->getArrayResult();
	}
}
