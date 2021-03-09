<?php

namespace App\Controller;

use App\Entity\Comment;
use App\Entity\Post;
use App\Repository\CommentRepository;
use App\Repository\PostRepository;
use Doctrine\ORM\EntityManagerInterface;
use http\Env\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

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

}
