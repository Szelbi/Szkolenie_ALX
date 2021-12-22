<?php
declare(strict_types=1);


namespace App\Tests;


use App\Entity\Post;
use App\Repository\DoctrinePostRepository;
use App\Repository\PostRepositoryInterface;
use App\Service\Dto\GetPostDto;
use App\Service\Dto\GetPostUseCase;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

final class GetPostKernelTest extends KernelTestCase
{
    private DoctrinePostRepository $repository;

    private $postId;

	public function setUp(): void
    {
        $this->repository = self::getContainer()->get(PostRepositoryInterface::class);
    }


    public function nazwaFunkcji(int $a)
    {
        dump($a);
    }



	public function test(): void
    {
		//przygotowanie środowiska -> można w funkcjach given..()
        $post = (new Post())
            ->setTitle('title')
            ->setText('text')
            ->setAuthor('author');

        $this->repository->store($post);
        $this->postId = $post->getId();

        $useCase = new GetPostUseCase(
            $this->repository
        );
		//wykonanie -> funkcja when..()
        $dto = $useCase->__invoke((string) $post->getId());

        self::assertInstanceOf(GetPostDto::class, $dto);
        self::assertEquals($this->postId, $dto->getId());



//        die("test działa \n");
    }
}