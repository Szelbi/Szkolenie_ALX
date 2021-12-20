<?php

namespace App\Repository;

use App\Entity\Post;

interface PostRepositoryInterface
{

    public function findAll();

    /*
     * interface zwraca Query z doctrine, no trudno :) potrzebujem go do paginatora.
     */
    public function getFindAllQuery(): \Doctrine\ORM\Query;


    public function store(Post $post);
}