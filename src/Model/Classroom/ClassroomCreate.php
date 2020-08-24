<?php


namespace App\Model\Classroom;


use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class ClassroomCreate
 * @package App\Model
 */
class ClassroomCreate
{
    /**
     * @Assert\NotBlank(message="Field name is required")
     * @Assert\Length(
     *     max="255",
     *     maxMessage="Field name is more than {{ limit }} !"
     * )
     * @var string
     */
    public $name;

    /**
     * @Assert\Type(type="bool", message="Filed must be bool")
     * @Assert\NotNull(message="Field isActive is required")
     * @var string
     */
    public $isActive;


}