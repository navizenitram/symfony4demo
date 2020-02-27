<?php
    declare(strict_types=1);


    namespace App\Controller;


    use App\Entity\Post;
    use App\Post\Application\PostFinder;
    use App\Post\Infrastructure\MySqlPostRepository;
    use App\Repository\PostRepository;
    use Doctrine\ORM\EntityManagerInterface;
    use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
    use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
    use Symfony\Component\HttpFoundation\Response;

    final class PostController extends AbstractController
    {
        public function home()
        {
            return $this->render('posts/home.html.twig');
        }

        public function showPost($post)
        {
            $postFinder = new PostFinder(new MySqlPostRepository($this->getDoctrine()->getManager()));

            try {
                return $this->render('posts/post.html.twig', [
                    'postObject' => $postFinder($post),
                ]);
            } catch (\Exception $e) {
                $this->createNotFoundException($e->getMessage());
            }
        }
    }