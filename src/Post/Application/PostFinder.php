<?php
declare(strict_types=1);


namespace App\Post\Application;


use App\Entity\Post;
use App\Post\Domain\PostRepository;


final class PostFinder
{
    private $postRepository;

    public function __construct(PostRepository $postRepository)
    {
        $this->postRepository = $postRepository;
    }

    //TODO: desacoplar Post. Esto debe ser un ValueObject del dominio.
    public function __invoke(string $postName): Post
    {
        $postObject = $this->postRepository->findByPostName($postName);
        if (!$postObject) {
            throw new \Exception('Not found post');
        }
        return $postObject;
    }

}