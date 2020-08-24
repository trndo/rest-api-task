<?php


namespace App\Controller\Query;


use App\Model\Classroom\ClassroomListResponse;
use App\Service\DataProvider\ClassroomDataProviderInterface;
use App\Service\PaginatorService\Paginator;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\{JsonResponse, Request, Response};
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/api", name="classroom_")
 * Class ClassroomController
 * @package App\Controller\Command
 */
class ClassroomController extends AbstractController
{
    /**
     * Get all classrooms
     *
     * @Route("/classrooms", name="index", methods={"GET"})
     */
    public function index(
        Request $request,
        ClassroomDataProviderInterface $classroomDataProvider,
        Paginator $paginator
    ): JsonResponse {
        $response = new ClassroomListResponse();

        $classroomsItems = $classroomDataProvider->fetchAll($request);
        $classroomsTotalRows = $classroomDataProvider->getRowsCount($request);

        $response->data = $classroomsItems;
        $response->links = $paginator->createPagination(
            $request->query->getInt('count', 10),
            $request->query->getInt('page', 1),
            $classroomsTotalRows,
            'classroom_index'
        );

        return new JsonResponse($response, Response::HTTP_OK);
    }

    /**
     * Get one classroom
     *
     * @Route("/classrooms/{id}", name="show", methods={"GET"})
     */
    public function show(
        int $id,
        ClassroomDataProviderInterface $classroomDataProvider
    ): JsonResponse {
        $classroomItem = $classroomDataProvider->get($id);

        return new JsonResponse($classroomItem, Response::HTTP_OK);
    }
}