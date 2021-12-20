<?php

namespace App\DataFixtures;

use App\Entity\Post;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class AppFixtures extends Fixture
{

    public function load(ObjectManager $manager): void
    {

        $faker = Factory::create('pl_PL');

        $batchSize = 20;

        for ($i = 0; $i < 100; $i++) {

            $date = new \DateTimeImmutable(($faker->dateTimeBetween('-1 days')->format('c')));

            $post = new Post();

            $post
                ->setTitle($faker->realText(50))
                ->setText($faker->realText())
                ->setAuthor($faker->name)
                ->setCreatedAt($date);

            $manager->persist($post);

            if (($i % $batchSize) === 0) {
                $manager->flush();
                $manager->clear(); // Detaches all objects from Doctrine!
            }
        }

        $manager->flush();
    }
}
