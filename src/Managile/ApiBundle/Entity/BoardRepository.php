<?php
/**
 * Created by PhpStorm.
 * User: Arthur
 * Date: 25/11/2015
 * Time: 18:34
 */
namespace Managile\ApiBundle\Entity;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\QueryBuilder;

class BoardRepository extends EntityRepository
{
    /**
     * @param $team_id
     * @return mixed
     */
    public function showBoardByTeam($team_id)
    {
        $qb = $this->createQueryBuilder('a');

        $qb->select('a.id, a.name ,a.description')
            ->where('a.team = :team_id')
            ->setParameter('team_id', $team_id);

        return $qb->getQuery()
            ->getResult();
    }
}