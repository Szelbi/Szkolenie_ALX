<?php
declare(strict_types=1);


namespace App\DataFixtures;

use App\Service\Dto\UserDto;
use App\Service\UserRegisterUseCase;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

final class UserFixtures extends Fixture
{
    public function __construct(
        private UserRegisterUseCase $useCase
	){}

    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('pl_PL');

        $userDto = new UserDto();
        $userDto->setEmail('user@email.com');
        $userDto->setPassword('haslo');
        $this->useCase->__invoke($userDto);


        $adminDto = new UserDto();
        $adminDto->setEmail('admin@email.com');
        $adminDto->setPassword('haslo');
        $adminDto->setRoles(['ROLE_ADMIN']);
        $this->useCase->__invoke($adminDto);

    }

}