<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

use App\Entity\Post;

/**
 * @Route("/post", name="post")
 */
class PostController extends AbstractController
{
    /**
     * @Route("/", name="post_list")
     */
    public function list()
    {
        $posts = $this->getDoctrine()->getRepository(Post::class)->findAll();

        // Pour retourner en JSON -> composer require symfony/serializer-pack
        return $this->json($posts);
    }

    /**
     * @Route("/show/{id}", name="post_show")
     */
    public function show($id)
    {
        $post = $this->getDoctrine()->getRepository(Post::class)->find($id);

        return $this->json($post);
    }

    /**
     * @Route("/new", name="post_create")
     */
    public function create(Request $request)
    {
        $date = new \Datetime();
        // Configuration PHP -> changer date.timezone
        // OU $date->setTimezone(new \DateTimeZone('Europe/Paris'));

        $entityManager = $this->getDoctrine()->getManager();

        $post = new Post();
        $post->setTitle($request->get('title'));
        $post->setShorttext($request->get('shorttext'));
        $post->setText($request->get('text'));
        $post->setAuthor($request->get('author'));
        $post->setUrlimage($request->get('urlimage'));
        $post->setCreatedat($date);
        $post->setUpdatedat($date);

        $entityManager->persist($post);
        $entityManager->flush();

        return $this->json($post);
    }

    /**
     * @Route("/edit/{id}", name="post_edit")
     */
    public function update($id, Request $request)
    {
        $date = new \Datetime();

        $entityManager = $this->getDoctrine()->getManager();
        $post = $entityManager->getRepository(Post::class)->find($id);

        $post->setTitle($request->get('title'));
        $post->setShorttext($request->get('shorttext'));
        $post->setText($request->get('text'));
        $post->setAuthor($request->get('author'));
        $post->setUrlimage($request->get('urlimage'));
        $post->setUpdatedat($date);
        
        $entityManager->flush();

        return $this->json($post);
    }
}
