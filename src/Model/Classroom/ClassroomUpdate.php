<?php


namespace App\Model\Classroom;


use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class ClassroomUpdate
 * @package App\Model
 */
class ClassroomUpdate
{
    /**
     * @Assert\NotBlank(message="Field name is required")
     * @var string
     */
    public $name;

    /**
     * @Assert\Type(type="bool", message="Filed isActive must be bool")
     * @Assert\NotNull(message="Field isActive is required")
     * @var bool
     */
    public $isActive;
}