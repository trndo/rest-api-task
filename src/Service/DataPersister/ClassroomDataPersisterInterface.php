<?php


namespace App\Service\DataPersister;


use App\Model\ClassroomCreate;
use App\Model\ClassroomUpdate;

interface ClassroomDataPersisterInterface
{
    public function create(ClassroomCreate $classroomCreate): void;

    public function update(int $id, ClassroomUpdate $classroomUpdate): void;

    public function remove(int $id): void;

    public function toggleIsActive(int $id): void;
}