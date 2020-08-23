<?php


namespace App\Controller\Query;


use App\Model\ClassroomListResponse;
use App\Service\DataProvider\ClassroomDataProviderInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
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
        ClassroomDataProviderInterface $classroomDataProvider
    ): JsonResponse {
        $classroomsItems = $classroomDataProvider->fetchAll($request);
        $classroomsCount = $classroomDataProvider->getRowsCount($request);

        $response = new ClassroomListResponse();
        $response->data = $classroomsItems;

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