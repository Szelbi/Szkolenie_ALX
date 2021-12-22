<?php
declare(strict_types=1);

namespace App\Tests;

use App\Entity\Post;
use App\Service\Dto\GetPostDto;
use App\Service\Dto\GetPostUseCase;
use App\Tests\Doubles\MockPostRepository;
use PHPUnit\Framework\TestCase;

final class GetPostTest extends TestCase
{

    private const POST_ID = 1511;

    public function test() : void
    {

        $this->markTestSkipped();

        $repository = new MockPostRepository();

        $post = (new Post())
            ->setId(self::POST_ID)
            ->setTitle('title')
            ->setText('text')
            ->setAuthor('author');

        $repository->store($post);

        $useCase = new GetPostUseCase(
            $repository
        );

        $dto = $useCase((string) self::POST_ID);

        self::assertInstanceOf(GetPostDto::class, $dto);
        self::assertInstanceOf((string) self::POST_ID, $dto->getId());


        die("test działa \n");
    }
}