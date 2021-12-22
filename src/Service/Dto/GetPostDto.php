<?php
declare(strict_types=1);

namespace App\Service\Dto;

use App\Entity\Post;

final class GetPostDto
{

    private int $id;

    private string $title;

    private string $text;

    private string $author;

    private string $createdAt;


    public function __construct(int $id, string $title, string $text, string $author, string $createdAt)
    {
        $this->id        = $id;
        $this->title     = $title;
        $this->text      = $text;
        $this->author    = $author;
        $this->createdAt = $createdAt;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    public function getText(): string
    {
        return $this->text;
    }

    public function setText(string $text): void
    {
        $this->text = $text;
    }

    public function getAuthor(): string
    {
        return $this->author;
    }

    public function setAuthor(string $author): void
    {
        $this->author = $author;
    }

    public function getCreatedAt(): string
    {
        return $this->createdAt;
    }

    public function setCreatedAt(string $createdAt): void
    {
        $this->createdAt = $createdAt;
    }




}