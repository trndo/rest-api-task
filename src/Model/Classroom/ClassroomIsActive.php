<?php


namespace App\Model\Classroom;


use Symfony\Component\Validator\Constraints as Assert;

class ClassroomIsActive
{
    /**
     * @Assert\Type(type="bool", message="Filed must be bool")
     * @Assert\NotNull(message="Filed isActive is required"))
     * @var bool
     */
    public $isActive;
}