<?php
    declare(strict_types=1);


    namespace App\Controller;


    use Symfony\Component\HttpFoundation\Response;

    final class PostController
    {
        public function home() {
            return new Response('Hello tech yogi friends!!');
        }
    }