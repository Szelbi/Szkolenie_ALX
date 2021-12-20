<?php
declare(strict_types=1);

namespace App\DataFixtures;

use App\Service\UserRegisterUseCase;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

final class UserFixture extends Fixture
{

    public function __construct(
        private UserRegisterUseCase $useCase
    ) {}

    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('pl_PL');

        $this->useCase->__invoke(
            'test@example.com',
            'haslo'
        );

//        for($i = 0; $i < 10; $i++ ) {
//            $this->useCase->__invoke(
//                $faker->email,
//                $faker->password(8, 20)
//            );
//        }
    }
}