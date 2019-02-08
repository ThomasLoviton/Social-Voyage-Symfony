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
        // $post = $this->getDoctrine()->getRepository(Post::class)->find($idpost);
        $comments = $this->getDoctrine()->getRepository(Comment::class)->findBy(['idpost' => $idpost]);

        // ->getRepository(Comment::class)->findAll()
        // Pour retourner en JSON -> composer require symfony/serializer-pack
        return $this->json($comments);
    }

    /**
     * @Route("/{id}/show", name="Comment_show")
     */
    public function show($id)
    {
        $Comment = $this->getDoctrine()->getRepository(Comment::class)->find($id);

        return $this->json($Comment);
    }

    /**
     * @Route("/new", name="Comment_create")
     */
    public function create(Request $request)
    {
        $date = new \Datetime();
        // Configuration PHP -> changer date.timezone
        // OU $date->setTimezone(new \DateTimeZone('Europe/Paris'));

        $entityManager = $this->getDoctrine()->getManager();

        $Comment = new Comment();
        $Comment->setTitle($request->get('title'));
        $Comment->setShorttext($request->get('shorttext'));
        $Comment->setText($request->get('text'));
        $Comment->setAuthor($request->get('author'));
        $Comment->setUrlimage($request->get('urlimage'));
        $Comment->setCreatedat($date);
        $Comment->setUpdatedat($date);

        $entityManager->persist($Comment);
        $entityManager->flush();
        
        return $this->json($Comment);
    }

    /**
     * @Route("/{id}/edit", name="Comment_edit")
     */
    public function update($id, Request $request)
    {
        $date = new \Datetime();

        $entityManager = $this->getDoctrine()->getManager();
        $Comment = $entityManager->getRepository(Comment::class)->find($id);

        $Comment->setTitle($request->get('title'));
        $Comment->setShorttext($request->get('shorttext'));
        $Comment->setText($request->get('text'));
        $Comment->setAuthor($request->get('author'));
        $Comment->setUrlimage($request->get('urlimage'));
        $Comment->setUpdatedat($date);
        
        $entityManager->flush();

        return $this->json($Comment);
    }

    /**
     * @Route("/{id}/delete", name="Comment_delete")
     */
    public function delete($id)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $Comment = $entityManager->getRepository(Comment::class)->find($id);
        $entityManager->remove($Comment);
        $entityManager->flush();
        
        return $this->json('Id ' . $id . ' deleted');
    }
}

