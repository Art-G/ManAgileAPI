<?php
/**
 * Created by PhpStorm.
 * User: Arthur
 * Date: 25/11/2015
 * Time: 18:34
 */
namespace Managile\ApiBundle\Entity;

use Doctrine\ORM\EntityRepository;

class BoardRepository extends EntityRepository
{
    /**
     * @param $team_id
     * @return mixed
     */
    public function findBoardByTeam($team_id)
    {
        $query = createQueryBuilder('b');

        return $query->join('b.team t')
            ->where($query->expr()->eq('t.id', ':team_id'))
            ->setParameter('team_id', $team_id)
            ->getQuery();

            /*$this->getEntityManager()
            ->createQuery(
                'SELECT b FROM ManagileApiBundle:board b  WHERE b.team LIKE 1'
            )
            ->setParameter("team_id", $team_id)
            ->getResult();*/
    }
}