<?php

namespace App\Repository;

use App\Entity\Post;
use Doctrine\ORM\Query;

interface PostRepositoryInterface
{

    public function findAll();

    /*
     * interface zwraca Query z doctrine, no trudno :) potrzebujem go do paginatora.
     */
    public function getFindAllQuery(): Query;

    public function store(Post $post);

    public function findById(string $id) : Post;
}