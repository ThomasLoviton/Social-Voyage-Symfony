<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

use App\Entity\Comment;
use App\Entity\Post;

/**
 * @Route("/post/{idpost}/comment", name="comment")
 */
class CommentController extends AbstractController
{
    /**
     * @Route("/", name="comment_list")
     */
    public function list($idpost)
    {
        $comments = $this->getDoctrine()->getRepository(Comment::class)->findBy(['idpost' => $idpost]);

        return $this->json($comments);
    }

    /**
     * @Route("/{id}/show", name="comment_show")
     */
    public function show($id)
    {
        $comment = $this->getDoctrine()->getRepository(Comment::class)->find($id);

        return $this->json($comment);
    }

    /**
     * @Route("/new", name="comment_create")
     */
    public function create($idpost, Request $request)
    {
        $date = new \Datetime();
        // Configuration PHP -> changer date.timezone
        // OU $date->setTimezone(new \DateTimeZone('Europe/Paris'));

        $entityManager = $this->getDoctrine()->getManager();

        $comment = new Comment();
        $comment->setIdpost($idpost);
        $comment->setText($request->get('text'));
        $comment->setAuthor($request->get('author'));
        $comment->setPostedat($date);

        $entityManager->persist($comment);
        $entityManager->flush();
        
        return $this->json($comment);
    }

    /**
     * @Route("/{id}/edit", name="comment_edit")
     */
    public function update($id, Request $request)
    {
        $date = new \Datetime();

        $entityManager = $this->getDoctrine()->getManager();
        $comment = $entityManager->getRepository(Comment::class)->find($id);

        $comment->setText($request->get('text'));
        $comment->setAuthor($request->get('author'));
        
        $entityManager->flush();

        return $this->json($comment);
    }

    /**
     * @Route("/{id}/delete", name="comment_delete")
     */
    public function delete($id)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $comment = $entityManager->getRepository(Comment::class)->find($id);
        $entityManager->remove($comment);
        $entityManager->flush();
        
        return $this->json('Id ' . $id . ' deleted');
    }
}

