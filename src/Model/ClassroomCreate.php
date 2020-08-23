<?php


namespace App\Model;


use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class ClassroomCreate
 * @package App\Model
 */
class ClassroomCreate
{
    /**
     * @Assert\NotNull(message="Field name can not be null")
     * @Assert\NotBlank(message="Filed name is required")
     * @Assert\Length(
     *     max="255",
     *     maxMessage="Field name is more than {{ limit }} !"
     * )
     * @var string
     */
    public $name;

    /**
     * @Assert\Type(type="bool", message="Filed must be bool")
     * @var string
     */
    public $isActive;


}