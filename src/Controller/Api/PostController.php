<?php
declare(strict_types=1);

namespace App\Controller\Api;

use App\Repository\PostRepositoryInterface;
use App\Service\Dto\GetPostUseCase;
use App\Service\Dto\NewPostDto;
use App\Service\Dto\GetPostDto;
use App\Service\NewPostUseCase;
use App\Utils\Validator\AppValidatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\Normalizer\AbstractNormalizer;
use App\Utils\Serializer\SerializerInterface;

#[Route('/api/post')]
final class PostController extends AbstractController
{

    #[Route('/{id}', name: 'api_post_show', methods: ['GET'])]
    public function show(
        string $id,
        SerializerInterface $serializer,
        GetPostUseCase $useCase
    ): JsonResponse
    {

        $post = $useCase($id);

        $post = $serializer->serialize($post, 'json');

        return new JsonResponse(data: $post, json: true);
    }

    #[Route('', name: 'api_post_new', methods: ['POST'])]
    public function new(
        Request $request,
        SerializerInterface $serializer,
        AppValidatorInterface $validator,
        NewPostUseCase $useCase
    ): JsonResponse {
        $json       = $request->getContent();
        $newPostDto = $serializer->deserialize($json, NewPostDto::class, 'json',
            [AbstractNormalizer::ALLOW_EXTRA_ATTRIBUTES => false]
        );

        $validator->validate($newPostDto);

        $useCase($newPostDto);

        return new JsonResponse('Wspanialy sukces', 200);
    }

    // @TODO list posts in api
    //	#[Route('/', name: 'api_post_show', methods: ['GET'])]
    //	public function index(Post $post, SerializerInterface $serializer): JsonResponse
    //	{
    //		$post = $serializer->serialize($post, 'json');
    //		return new JsonResponse(data: $post, json: true);
    //	}
}