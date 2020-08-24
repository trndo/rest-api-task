<?php


namespace App\Controller\Command;


use App\Exception\CustomValidatorException;
use App\Model\Classroom\{ClassroomCreate, ClassroomIsActive, ClassroomUpdate};
use Symfony\Component\HttpFoundation\{JsonResponse, Request, Response};
use App\Service\DataPersister\ClassroomDataPersisterInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

/**
 * @Route("/api", name="classroom_")
 *
 * Class ClassroomController
 * @package App\Controller\Query
 */
class ClassroomController extends AbstractController
{
    /**
     * @var ValidatorInterface
     */
    private $validator;
    /**
     * @var ClassroomDataPersisterInterface
     */
    private $classroomDataPersister;

    public function __construct(
        ValidatorInterface $validator,
        ClassroomDataPersisterInterface $classroomDataPersister
    ) {
        $this->validator = $validator;
        $this->classroomDataPersister = $classroomDataPersister;
    }

    /**
     * Create classroom
     *
     * @Route("/classrooms", name="create", methods={"POST"})
     * @throws CustomValidatorException
     */
    public function create(
        Request $request,
        SerializerInterface $serializer
    ): JsonResponse {
        /** @var ClassroomCreate $classroomCreateModel */
        $classroomCreateModel = $serializer->deserialize(
            $request->getContent(),
            ClassroomCreate::class,
            'json'
        );

        $errors = $this->validator->validate($classroomCreateModel);

        if ($errors->count() > 0) {
            throw new CustomValidatorException($errors);
        }

        $this->classroomDataPersister->create($classroomCreateModel);

        return new JsonResponse([
            'status' => true
        ], Response::HTTP_CREATED);
    }

    /**
     * Update classroom
     *
     * @Route("/classrooms/{id}", name="update", methods={"PUT"})
     * @throws CustomValidatorException
     */
    public function update(
        int $id,
        Request $request,
        SerializerInterface $serializer
    ): JsonResponse {
        /** @var ClassroomUpdate $classroomUpdateModel */
        $classroomUpdateModel = $serializer->deserialize(
            $request->getContent(),
            ClassroomUpdate::class,
            'json'
        );

        $errors = $this->validator->validate($classroomUpdateModel);

        if ($errors->count() > 0) {
            throw new CustomValidatorException($errors);
        }

        $this->classroomDataPersister->update($id, $classroomUpdateModel);

        return new JsonResponse([
            'status' => true
        ], 200);
    }

    /**
     * Delete classroom
     *
     * @Route("/classrooms/{id}", name="remove", methods={"DELETE"})
     */
    public function remove(
        int $id
    ): JsonResponse {
        $this->classroomDataPersister->remove($id);

        return new JsonResponse([
            'status' => true
        ], Response::HTTP_NO_CONTENT);
    }

    /**
     * Update classroom isActive status
     *
     * @Route("/classrooms/{id}/activation", name="activation", methods={"PATCH"})
     * @throws CustomValidatorException
     */
    public function updateActivation(
        int $id,
        Request $request,
        SerializerInterface $serializer
    ): JsonResponse {
        /** @var ClassroomIsActive $classroomIsActiveUpdateModel */
        $classroomIsActiveUpdateModel = $serializer->deserialize(
            $request->getContent(),
            ClassroomIsActive::class,
            'json'
        );

        $errors = $this->validator->validate($classroomIsActiveUpdateModel);

        if ($errors->count() > 0) {
            throw new CustomValidatorException($errors);
        }

        $this->classroomDataPersister->updateIsActive($id, $classroomIsActiveUpdateModel);

        return new JsonResponse([
            'status' => true
        ], Response::HTTP_OK);
    }
}