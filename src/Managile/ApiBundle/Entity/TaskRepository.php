<?php
/**
 * Created by PhpStorm.
 * User: Arthur
 * Date: 13/12/2015
 * Time: 17:35
 */

namespace Managile\ApiBundle\Entity;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\QueryBuilder;

class TaskRepository extends EntityRepository
{
    /**
     * @param $list_id
     * @return mixed
     */
    public function showTaskByList($list_id)
    {
        $qb = $this->createQueryBuilder('a');

        $qb->select('a.id, a.name , a.position, a.description, IDENTITY(a.list)')
            ->where('a.list = :list_id')
            ->setParameter('list_id', $list_id);

        return $qb->getQuery()
            ->getResult();
    }
}