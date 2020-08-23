<?php

namespace App\Repository;

use App\Entity\Classroom;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\EntityNotFoundException;
use Doctrine\ORM\QueryBuilder;
use Doctrine\ORM\Tools\Pagination\Paginator;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\ParameterBag;

/**
 * @method Classroom|null find($id, $lockMode = null, $lockVersion = null)
 * @method Classroom|null findOneBy(array $criteria, array $orderBy = null)
 * @method Classroom[]    findAll()
 * @method Classroom[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ClassroomRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Classroom::class);
    }

    /**
     * Find classroom by id
     *
     * @param int $id
     * @return Classroom
     * @throws EntityNotFoundException
     */
    public function findById(int $id): Classroom
    {
        $classroom = $this->find($id);

        if (null === $classroom) {
            throw new EntityNotFoundException(
                'Entity with id = ' . $id . 'not found'
            );
        }

        return $classroom;
    }

    /**
     * Find all classrooms by request params with pagination
     *
     * @param ParameterBag $parameterBag
     * @return array
     */
    public function findAllByRequestParams(ParameterBag $parameterBag): Paginator
    {
        $count = $parameterBag->get('count', 10);
        $page = $parameterBag->get('page', 1);

        $qb = $this->createQueryBuilder('c')
            ->orderBy('c.createdAt', 'DESC');

        $this->addPaging($qb, $page, $count);

        return new Paginator($qb->getQuery(), false);
    }

    /**
     * Adding pagination method
     *
     * @param QueryBuilder $qb
     * @param int $page
     * @param int $count
     */
    private function addPaging(
        QueryBuilder $qb,
        int $page = 1,
        int $count = 0
    ): void {
        // Prevent setting page value less than 0
        $startResult = max($page - 1, 0) * $count;
        $qb->setFirstResult($startResult);

        if ($count > 0) {
            $qb->setMaxResults($count);
        }
    }

    public function getTotalRowsCountByRequestParams(ParameterBag $parameterBag): int
    {
        $paginator = $this->findAllByRequestParams($parameterBag);

        return $paginator->count();
    }

}
