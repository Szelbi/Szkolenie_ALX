<?php
declare(strict_types=1);


namespace App\Controller;


use App\Form\UserType;
use App\Service\Dto\UserDto;
use App\Service\UserRegisterUseCase;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

use Symfony\Component\Routing\Annotation\Route;

#[Route('/user')]
final class UserController extends AbstractController
{
    #[Route('/register', name: 'user_register', methods: ['GET', 'POST'])]
	public function register(Request $request,UserRegisterUseCase $userRegister): Response
    {

        $userDto = new UserDto();
        $form = $this->createForm(UserType::class, $userDto);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $userRegister($userDto);
        }


        return $this->renderForm('user/new.html.twig', [
            'form' => $form,
        ]);
    }
}