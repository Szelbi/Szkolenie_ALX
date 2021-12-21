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

    /**
     * @return string
     */
    public function getCreatedAt(): string
    {
        return $this->createdAt;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @return string
     */
    public function getText(): string
    {
        return $this->text;
    }

    /**
     * @return string
     */
    public function getAuthor(): string
    {
        return $this->author;
    }



}