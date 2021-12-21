<?php
declare(strict_types=1);

namespace App\Service;

use App\Entity\Post;
use App\Repository\PostRepositoryInterface;
use App\Service\Dto\NewPostDto;

final class NewPostUseCase
{

    public function __construct(
        private PostRepositoryInterface $repository
    ) {
    }

    public function __invoke(NewPostDto $postDto): void
    {
        $post = (new Post())
            ->setTitle($postDto->getTitle())
            ->setText($postDto->getText())
            ->setAuthor($postDto->getAuthor());

        /**
         * Tutaj możemy dodać potrzebną logikę
         */
        $this->repository->store($post);
    }

}