<?php


namespace App\Mapper;


use App\Entity\Classroom;
use App\Model\Classroom\ClassroomItem;

/**
 * Class ClassroomMapper
 * @package App\Mapper
 */
class ClassroomMapper
{
    /**
     * Transform entity to model ClassroomItem
     *
     * @param Classroom $classroom
     * @return ClassroomItem
     */
    public static function fromEntityToItem(Classroom $classroom): ClassroomItem
    {
        $item = new ClassroomItem();

        $item->id = $classroom->getId();
        $item->name = $classroom->getName();
        $item->createdAt = $classroom->getCreatedAt()->format('d-m-Y H:i:s');
        $item->isActive = $classroom->getIsActive();

        return $item;
    }
}