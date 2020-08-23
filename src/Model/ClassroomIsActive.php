<?php


namespace App\Model;


use Symfony\Component\Validator\Constraints as Assert;

class ClassroomIsActive
{
    /**
     * @Assert\Type(type="bool", message="Filed must be bool")
     * @var bool
     */
    public $isActive;
}