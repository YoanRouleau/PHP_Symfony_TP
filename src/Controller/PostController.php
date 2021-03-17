<?php

namespace App\Controller;

use App\Entity\Comment;
use App\Entity\Post;
use App\Form\PostType;
use App\Repository\CommentRepository;
use App\Repository\PostRepository;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;



class PostController extends AbstractController
{
    #[Route('/post', name: 'post')]
    public function index(PostRepository $postRepository): Response
    {
        $posts = $postRepository->findAll();

        return $this->render('post/index.html.twig', [
            'controller_name' => 'PostController',
            'posts' => $posts
        ]);
    }

    #[Route('/post/{id}', name: 'post_show')]
    public function show(PostRepository $postRepository, CommentRepository $commentRepository, $id): Response{
        $post = $postRepository->find($id);
        $comments = $commentRepository->findBy(array('post' => $id));
        return $this->render('post/show.html.twig', [
            'controller_name' => 'PostController',
            'post' => $post,
            'comments' => $comments
        ]);
    }


    /**
     * @Route("/post/new/post", name="post_new")
     * @IsGranted("ROLE_ADMIN", message="No access! Get out!")
     */
    public function new(Request $request, PostRepository $postRepository, UserRepository $user): Response{
        $post = new Post();
        $post->setCreatedAt(new \DateTime("now"));
        $post->setAuthor($this->getUser());
        $post->setIsPublished(true);
        $post->setIsDeleted(false);

        $form = $this->createForm(PostType::class, $post);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $this->getDoctrine()->getManager()->persist($post);
            $this->getDoctrine()->getManager()->flush();
            return $this->redirectToRoute('post');
        }

        return $this->render('post/new.html.twig', [
            'form' => $form->createView()
        ]);
    }

}
