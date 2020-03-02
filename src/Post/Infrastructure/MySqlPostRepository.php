<?php
declare(strict_types=1);


namespace App\Post\Infrastructure;


use App\Entity\Post;
use App\Post\Domain\PostRepository;
use Doctrine\Persistence\ObjectManager;

final class MySqlPostRepository implements PostRepository
{

    private $objectManager;
    private $objectRepository;

    public function __construct(ObjectManager $objectManager)
    {
        $this->objectManager    = $objectManager;
        $this->objectRepository = $this->objectManager->getRepository(Post::class);
    }


    public function findByPostName(string $postName): Post
    {
        return $this->objectRepository->findOneBy(['post_name' => $postName]);
    }

    public function raw($sql) {
        $this->objectManager->
    }
}