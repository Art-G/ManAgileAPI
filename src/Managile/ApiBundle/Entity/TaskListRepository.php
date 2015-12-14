<?php
/**
 * Created by PhpStorm.
 * User: Arthur
 * Date: 13/12/2015
 * Time: 14:05
 */

namespace Managile\ApiBundle\Entity;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\QueryBuilder;

class TaskListRepository extends EntityRepository
{
    /**
     * @param $board_id
     * @return mixed
     */
    public function showTaskListByBoard($board_id)
    {
        $qb = $this->createQueryBuilder('a');

        $qb->select('a.id, a.name ,a.position')
            ->where('a.board = :board_id')
            ->setParameter('board_id', $board_id);

        return $qb->getQuery()
            ->getResult();
    }
}