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
     *
     * @param ClassroomCreate $classroomCreate
     */
    public function create(ClassroomCreate $classroomCreate): void;

    /**
     * Update Classroom entity
     *
     * @param int $id
     * @param ClassroomUpdate $classroomUpdate
     */
    public function update(int $id, ClassroomUpdate $classroomUpdate): void;

    /**
     * Remove Classroom entity
     *
     * @param int $id
     */
    public function remove(int $id): void;

    /**
     * Update isActive Classroom property
     *
     * @param int $id
     * @param ClassroomIsActive $classroomUpdate
     */
    public function updateIsActive(int $id, ClassroomIsActive $classroomUpdate): void;
}