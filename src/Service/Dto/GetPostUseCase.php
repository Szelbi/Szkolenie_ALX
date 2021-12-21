<?php
declare(strict_types=1);

namespace App\Service\Dto;

use App\Repository\PostRepositoryInterface;

final class GetPostUseCase
{

    public function __construct(
        private PostRepositoryInterface $repository
    ) {}

    public function __invoke(string $id) : GetPostDto
    {
        $post = $this->repository->findById($id);

        return new GetPostDto(
            $post->getId(),
            $post->getTitle(),
            $post->getText(),
            $post->getTitle(),
            $post->getCreatedAt()->format('c')
        );
    }

}