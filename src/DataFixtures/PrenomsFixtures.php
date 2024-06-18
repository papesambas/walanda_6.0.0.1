<?php

namespace App\DataFixtures;

use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Faker;
use App\Entity\Prenoms;
use App\DataFixtures\NomsFixtures;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class PrenomsFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $faker = Faker\Factory::create('fr_FR');
        for ($i = 1; $i <= 200; $i++) {
            $prenom = new Prenoms();
            $prenom->setDesignation($faker->unique()->firstName);
            $manager->persist($prenom);
            $this->addReference('prenom_' . $i, $prenom);
        }


        $manager->flush();
    }

    public function getDependencies(): array
    {
        return [
            NomsFixtures::class,
        ];
    }
}
