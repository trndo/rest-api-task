<?php


namespace App\Controller\Command;


use App\Model\ClassroomCreate;
use App\Model\ClassroomUpdate;
use App\Service\DataPersister\ClassroomDataPersisterInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;

/**
 * @Route("/api/classrooms", name="classroom_")
 *
 * Class ClassroomController
 * @package App\Controller\Query
 */
class ClassroomController extends AbstractController
{
    /**
     * @Route("", name="create", methods={"POST"})
     *
     * @param Request $request
     * @param ClassroomDataPersisterInterface $classroomDataPersister
     * @param SerializerInterface $serializer
     * @return JsonResponse
     */
    public function create(
        Request $request,
        ClassroomDataPersisterInterface $classroomDataPersister,
        SerializerInterface $serializer
    ): JsonResponse {
        /** @var ClassroomCreate $classroomCreateModel */
        $classroomCreateModel = $serializer->deserialize(
            $request->getContent(),
            ClassroomCreate::class,
            'json'
        );

        $classroomDataPersister->create($classroomCreateModel);

        return new JsonResponse([], Response::HTTP_CREATED);
    }

    /**
     * @Route("/{id}", name="update", methods={"PUT"})
     *
     * @param int $id
     * @param Request $request
     * @param ClassroomDataPersisterInterface $classroomDataPersister
     * @param SerializerInterface $serializer
     * @return JsonResponse
     */
    public function update(
        int $id,
        Request $request,
        ClassroomDataPersisterInterface $classroomDataPersister,
        SerializerInterface $serializer
    ): JsonResponse {
        /** @var ClassroomUpdate $classroomUpdateModel */
        $classroomUpdateModel = $serializer->deserialize(
            $request->getContent(),
            ClassroomUpdate::class,
            'json'
        );

        $classroomDataPersister->update($id, $classroomUpdateModel);

        return new JsonResponse([], 200);
    }

    /**
     * @Route("/{id}", name="remove", methods={"DELETE"})
     *
     * @param int $id
     * @param ClassroomDataPersisterInterface $classroomDataPersister
     * @return JsonResponse
     */
    public function remove(
        int $id,
        ClassroomDataPersisterInterface $classroomDataPersister
    ): JsonResponse {
        $classroomDataPersister->remove($id);

        return new JsonResponse([], Response::HTTP_NO_CONTENT);
    }

    /**
     * @Route("/{id}/toggle-is-active", methods={"PATCH"})
     *
     * @param int $id
     * @param ClassroomDataPersisterInterface $classroomDataPersister
     * @return JsonResponse
     */
    public function toggleIsActive(
        int $id,
        ClassroomDataPersisterInterface $classroomDataPersister
    ): JsonResponse {
        $classroomDataPersister->toggleIsActive($id);

        return new JsonResponse([], Response::HTTP_OK);
    }
}