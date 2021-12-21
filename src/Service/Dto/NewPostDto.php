<?php
declare(strict_types=1);

namespace App\Service\Dto;

use Symfony\Component\Serializer\Annotation\SerializedName;
use Symfony\Component\Validator\Constraints as Assert;

final class NewPostDto
{

    /**
     * @Assert\NotBlank()
     * @Assert\Length(min=5)
     */
    private string $title;

    /**
     * @Assert\NotBlank()
     * @Assert\Length(min=10)
     */
    private string $text;

    /**
     * @Assert\NotBlank()
     * @Assert\Length(min=3)
     */
    private string $author;

    /**
     * @param   string  $text
     * @param   string  $title
     * @param   string  $author
     */
    public function __construct(string $text, string $title, string $author)
    {
        $this->text   = $text;
        $this->title  = $title;
        $this->author = $author;
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
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @return string
     */
    public function getAuthor(): string
    {
        return $this->author;
    }



}