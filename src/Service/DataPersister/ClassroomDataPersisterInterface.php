<?php


namespace App\Service\DataPersister;


use App\Model\Classroom\{
    ClassroomCreate,
    ClassroomIsActive,
    ClassroomUpdate
};

/**
 * Interface ClassroomDataPersisterInterface
 * @package App\Service\DataPersister
 */
interface ClassroomDataPersisterInterface
{
    /**
     * Create Classroom entity
     */
    public function create(ClassroomCreate $classroomCreate): void;

    /**
     * Update Classroom entity
     */
    public function update(int $id, ClassroomUpdate $classroomUpdate): void;

    /**
     * Remove Classroom entity
     */
    public function remove(int $id): void;

    /**
     * Update isActive Classroom property
     */
    public function updateIsActive(int $id, ClassroomIsActive $classroomUpdate): void;
}