<?php
declare(strict_types=1);

namespace App\Controller\Api;

use App\Entity\Post;
use App\Service\Dto\NewPostDto;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

#[Route('/api/post')]
final class PostController
{

    #[Route('/{id}', name: 'api_post_show', methods: ['GET'])]
    public function show(Post $post, SerializerInterface $serializer): JsonResponse
    {
        $post = $serializer->serialize($post, 'json');

        return new JsonResponse(data: $post, json: true);
    }

    #[Route('', name: 'api_post_new', methods: ['POST'])]
    public function new(Request $request, ValidatorInterface $validator, SerializerInterface $serializer): JsonResponse
    {
        $json       = $request->getContent();
        $newPostDto = $serializer->deserialize($json, NewPostDto::class, 'json');

        $errors = $validator->validate($newPostDto);

        if (count($errors) > 0) {

            $errorsString = (string) $errors;

            return new JsonResponse($errorsString);
        }

        //        $post->setTitle($json->title);
        //        $post->setText($json->text);
        //        $post->setAuthor($json->author);
        //
        //        $entityManager->persist($post);
        //        $entityManager->flush();

        return new JsonResponse($newPostDto, 200);
    }
}