<?php
declare(strict_types=1);

namespace App\Service\Dto;

use Symfony\Component\Validator\Constraints as Assert;

final class UserDto
{
    /**
     * @Assert\NotBlank()
     * @Assert\Length(min=3)
     * @Assert\Email
     */
    private string $email;

    /**
     * @Assert\Length(min=5)
     * @return string
     */
    private string $password;

    /**
     * @var array
     */
    private array $roles = [];

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param   string  $email
     */
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @param   string  $password
     */
    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

    /**
     * @return array
     */
    public function getRoles(): array
    {
        return $this->roles;
    }


    /**
     * @param   array  $roles
     */
    public function setRoles(array $roles) : void
    {
        $this->roles = $roles;
    }




}