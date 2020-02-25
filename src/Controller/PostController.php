<?php
    declare(strict_types=1);


    namespace App\Controller;


    use App\Entity\Post;
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

        public function showPost($post, EntityManagerInterface $em)
        {
            $repository = $em->getRepository(Post::class);
            /** @var Post $postObject */
            $postObject = $repository->findOneBy(['post_name' => $post]);
            if (!$postObject) {
                throw $this->createNotFoundException('No found!');
            }
            //var_dump($postObject);die;
            return $this->render('posts/post.html.twig', [
                'postObject' => $postObject,
            ]);
        }
    }