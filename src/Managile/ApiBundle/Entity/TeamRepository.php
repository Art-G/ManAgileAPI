<?php
/**
 * Created by PhpStorm.
 * User: Arthur
 * Date: 26/03/2016
 * Time: 16:00
 */
namespace Managile\ApiBundle\Entity;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\QueryBuilder;

class TeamRepository extends EntityRepository
{
    /**
     * @param $user_id
     * @return mixed
     */
    public function showTeamByUser($user_id)
    {
        $qb = $this->createQueryBuilder('a');

        $qb->select('a.id')
            ->where('a.user_id = :user_id')
            ->setParameter('user_id', $user_id);

        return $qb->getQuery()
            ->getResult();
    }
}