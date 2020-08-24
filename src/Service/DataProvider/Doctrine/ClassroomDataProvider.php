<?php


namespace App\Service\DataProvider\Doctrine;


use App\Entity\Classroom;
use App\Mapper\ClassroomMapper;
use App\Model\Classroom\ClassroomItem;
use App\Repository\ClassroomRepository;
use App\Service\DataProvider\ClassroomDataProviderInterface;
use Symfony\Component\HttpFoundation\Request;

class ClassroomDataProvider implements ClassroomDataProviderInterface
{
    /**
     * @var ClassroomRepository
     */
    private $classroomRepository;

    public function __construct(ClassroomRepository $classroomRepository)
    {
        $this->classroomRepository = $classroomRepository;
    }

    public function fetchAll(Request $request): ?array
    {
        $classroomItems = [];
        $classrooms = $this->classroomRepository
            ->findAllByRequestParams($request->query);

        /** @var Classroom $classroom */
        foreach ($classrooms as $classroom) {
            $classroomItems[] = ClassroomMapper::fromEntityToItem($classroom);
        }

        return $classroomItems;
    }

    public function get(int $id): ?ClassroomItem
    {
        $classroom = $this->classroomRepository->findById($id);

        return ClassroomMapper::fromEntityToItem($classroom);
    }

    public function getRowsCount(Request $request): int
    {
        return $this->classroomRepository->getTotalRowsCountByRequestParams(
            $request->query
        );
    }
}