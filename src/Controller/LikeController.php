<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

use App\Entity\Comment;
use App\Entity\Post;

/**
 * @Route("/post/{idpost}", name="like")
 */
class LikeController extends AbstractController
{
    /**
     * @Route("/like", name="likepost_show")
     */
    public function showpost($idpost)
    {
        $likepost = $this->getDoctrine()->getRepository(Post::class)->find($idpost);

        return $this->json($likepost->getNumberlike());
    }

    /**
     * @Route("/like/up", name="uplikepost_up")
     */
    public function uppost($idpost)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $uplikepost = $entityManager->getRepository(Post::class)->find($idpost);

        $uplikepost->setNumberlike($uplikepost->getNumberlike() + 1);
        
        $entityManager->flush();

        return $this->json($uplikepost->getNumberlike());
    }

    /**
     * @Route("/like/down", name="downlikepost_up")
     */
    public function downpost($idpost)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $downlikepost = $entityManager->getRepository(Post::class)->find($idpost);

        $downlikepost->setNumberlike($downlikepost->getNumberlike() - 1);
        
        $entityManager->flush();

        return $this->json($downlikepost->getNumberlike());
    }

    /**
     * @Route("/comment/{idcomment}/like", name="likecomment_show")
     */
    public function showcomment($idcomment)
    {
        $likecomment = $this->getDoctrine()->getRepository(Comment::class)->find($idcomment);

        return $this->json($likecomment->getNumberlike());
    }

    /**
     * @Route("/comment/{idcomment}/like/up", name="uplikecomment_up")
     */
    public function upcomment($idcomment)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $uplikecomment = $entityManager->getRepository(Comment::class)->find($idcomment);

        $uplikecomment->setNumberlike($uplikecomment->getNumberlike() + 1);
        
        $entityManager->flush();

        return $this->json($uplikecomment->getNumberlike());
    }

    /**
     * @Route("/comment/{idcomment}/like/down", name="downlikecomment_up")
     */
    public function downcomment($idcomment)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $downlikecomment = $entityManager->getRepository(Comment::class)->find($idcomment);

        $downlikecomment->setNumberlike($downlikecomment->getNumberlike() - 1);
        
        $entityManager->flush();

        return $this->json($downlikecomment->getNumberlike());
    }
}
