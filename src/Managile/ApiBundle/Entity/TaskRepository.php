<?php
/**
 * Created by PhpStorm.
 * User: Amaury
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
	
	/**
     * @return mixed
     */
	public function showTaskToday()
    {
        $qb = $this->createQueryBuilder('a');

        $qb->select('a.id, a.name, a.dueDate')
			->where('a.dueDate >= :dueDate', 'a.dueDate < :dueDate2')
            ->setParameter('dueDate',new \DateTime())
			->setParameter('dueDate2',new \DateTime('tomorrow'));

        return $qb->getQuery()
            ->getResult();
    }
	
	/**
     * @return mixed
     */
	public function showTaskTomorrow()
    {
        $qb = $this->createQueryBuilder('a');

        $qb->select('a.id, a.name, a.dueDate')
			->where('a.dueDate >= :dueDate', 'a.dueDate < :dueDate2')
            ->setParameter('dueDate',new \DateTime('tomorrow'))
			->setParameter('dueDate2',new \DateTime('tomorrow + 1day'));

        return $qb->getQuery()
            ->getResult();
    }
	
	/**
     * @param $task_id
     * @return mixed
     */
    public function deleteTask($task_id)
    {
        $qb = $this->createQueryBuilder('a');

        $qb->delete()
            ->where('a.id = :task_id')
            ->setParameter('task_id', $task_id);

        return $qb->getQuery()
            ->getResult();
    }
	

}