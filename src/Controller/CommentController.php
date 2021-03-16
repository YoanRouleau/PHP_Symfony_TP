<?php

namespace App\Controller;

use App\Entity\Comment;
use App\Entity\Post;
use App\Entity\User;
use App\Form\CommentType;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CommentController extends AbstractController
{
    #[Route('/comment', name: 'comment')]
    public function index(): Response
    {
        return $this->render('comment/index.html.twig', [
            'controller_name' => 'CommentController',
        ]);
    }

    #[Route('/post/{post}/comment/add', name: 'comment-add')]
    public function new(Request $request, Post $post, UserRepository $userRepository): Response{

        $comment = new Comment();
        $comment->setCreatedAt(new \DateTime("now"));
        $comment->setPost($post);
        $comment->setAuthor($this->getUser());


        $form = $this->createForm(CommentType::class, $comment);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $this->getDoctrine()->getManager()->persist($comment);
            $this->getDoctrine()->getManager()->flush();
            return $this->redirectToRoute('post_show', [ 'id' => $post->getId() ]);
        }

        return $this->render('comment/new.html.twig', [
            'form' => $form->createView(),
            'post' => $post
        ]);
    }
}
