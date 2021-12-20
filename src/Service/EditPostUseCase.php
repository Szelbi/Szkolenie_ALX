<?php
declare(strict_types=1);

namespace App\Service;

use App\Entity\Post;
use App\Repository\PostRepositoryInterface;

final class EditPostUseCase
{

    public function __construct(
        private PostRepositoryInterface $repository
    ) {}


    public function __invoke(Post $post) : void
    {
        $post->setCreatedAt(new \DateTimeImmutable());

        /**
         * Tutaj możemy dodać potrzebną logikę
         */
        $this->repository->store($post);
    }

}