<?php
declare(strict_types=1);


namespace App\Post\Domain;


use App\Entity\Post;

interface PostRepository
{
   public function findByPostName(string $postName): Post;
}