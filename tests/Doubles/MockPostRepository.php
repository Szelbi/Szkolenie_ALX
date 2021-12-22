<?php

namespace App\Tests\Doubles;

use App\Entity\Post;
use App\Repository\PostRepositoryInterface;
use Doctrine\ORM\Query;

final class MockPostRepository implements PostRepositoryInterface
{
    private Post $post;

    public function findAll() : void
    {
        // TODO: Implement findAll() method.
    }

    public function getFindAllQuery(): Query
    {
        // TODO: Implement getFindAllQuery() method.
    }

    public function store(Post $post)
    {
        $this->post = $post;
    }

    public function findById(string $id): Post
    {
        return $this->post;
    }
}