<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Nelmio\Alice\Bridge\Symfony\DependencyInjection\NelmioAliceExtension;
use Nelmio\Alice\Loader\NativeLoader;

class NelmioAliceFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $loader = new \Nelmio\Alice\Loader\NativeLoader();
        $objectSet = $loader->loadFile(__DIR__.'/fixtures.yaml')->getObjects();
        foreach($objectSet as $object){
            $manager->persist($object);
        }
        $manager->flush();
    }
}
