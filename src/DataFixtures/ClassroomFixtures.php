<?php

namespace App\DataFixtures;

use App\Entity\Classroom;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ClassroomFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        for ($i = 0; $i < 40; $i++) {
            $classroom = new Classroom();
            $classroom->setName('Classroom stub_name #'.$i);
            $classroom->setIsActive($i % 2 == 0);
            $manager->persist($classroom);
        }

        $manager->flush();
    }
}
