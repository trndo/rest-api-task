<?php


namespace App\Model;


use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class ClassroomUpdate
 * @package App\Model
 */
class ClassroomUpdate
{
    /**
     * @Assert\NotBlank(message="Field name can not be null")
     * @var string
     */
    public $name;

    /**
     * @Assert\Type(type="bool", message="Filed must be bool")
     * @var bool
     */
    public $isActive;
}