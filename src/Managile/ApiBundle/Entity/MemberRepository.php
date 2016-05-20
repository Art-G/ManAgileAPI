<?php
/**
 * Created by PhpStorm.
 * User: Amaury
 * Date: 25/11/2015
 * Time: 18:34
 */
namespace Managile\ApiBundle\Entity;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\QueryBuilder;

class MemberRepository extends EntityRepository
{
    /**
     * @param $team_id
     * @return mixed
     */
    public function showMemberByTeam($team_id)
    {
        $qb = $this->createQueryBuilder('a');

        $qb->select('a')
            ->where('a.team = :team_id')
            ->setParameter('team_id', $team_id);

        return $qb->getQuery()
            ->getResult();
    }

    /**
     * @param $user_id
     * @return mixed
     */
    public function showMemberByUser($user_id)
    {
        $qb = $this->createQueryBuilder('a');

        $qb->select('a')
            ->where('a.user = :user_id')
            ->setParameter('user_id', $user_id);

        return $qb->getQuery()
            ->getResult();
    }
}