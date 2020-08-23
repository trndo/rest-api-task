<?php


namespace App\Service\DataPersister\Doctrine;


use App\Entity\Classroom;
use App\Model\ClassroomCreate;
use App\Model\ClassroomIsActive;
use App\Model\ClassroomUpdate;
use App\Service\DataPersister\ClassroomDataPersisterInterface;
use Doctrine\ORM\EntityManagerInterface;

class ClassroomDataPersister implements ClassroomDataPersisterInterface
{
    /**
     * @var EntityManagerInterface
     */
    private $entityManager;

    private $classroomRepository;

    /**
     * ClassroomDataPersister constructor.
     * @param EntityManagerInterface $entityManager
     */
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
        $this->classroomRepository = $this->entityManager->getRepository(
            Classroom::class
        );
    }

    /**
     * @inheritDoc
     * @param ClassroomCreate $classroomCreate
     */
    public function create(ClassroomCreate $classroomCreate): void
    {
        $classroom = new Classroom();

        $classroom->setName($classroomCreate->name)
            ->setIsActive($classroomCreate->isActive);

        $this->entityManager->persist($classroom);
        $this->entityManager->flush();
    }

    /**
     * @inheritDoc
     * @param int $id
     * @param ClassroomUpdate $classroomUpdate
     */
    public function update(int $id, ClassroomUpdate $classroomUpdate): void
    {
        /** @var Classroom $classroom */
        $classroom = $this->classroomRepository->findById($id);

        $classroom->setName($classroomUpdate->name);
        $classroom->setIsActive($classroomUpdate->isActive);

        $this->entityManager->flush();
    }

    /**
     * @inheritDoc
     * @param int $id
     */
    public function remove(int $id): void
    {
        /** @var Classroom $classroom */
        $classroom = $this->classroomRepository->findById($id);

        $this->entityManager->remove($classroom);
        $this->entityManager->flush();
    }

    /**
     * @inheritDoc
     * @param int $id
     * @param ClassroomUpdate $classroomUpdate
     */
    public function updateIsActive(int $id, ClassroomIsActive $classroomUpdate): void
    {
        /** @var Classroom $classroom */
        $classroom = $this->classroomRepository->findById($id);

        $classroom->setIsActive($classroomUpdate->isActive);

        $this->entityManager->flush();
    }
}