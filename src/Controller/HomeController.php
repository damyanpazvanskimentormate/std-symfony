<?php

namespace App\Controller;

use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;


class HomeController extends AbstractController
{
    /**
     * @Route("/", methods={"GET"})
     *
     * @param UserPasswordEncoderInterface $passwordEncoder
     * @return Response
     */
    public function index(UserPasswordEncoderInterface $passwordEncoder): Response
    {
        $user = new User();

        $adminExists = $this->getDoctrine()
            ->getRepository(User::class)
            ->checkForAdmin();

        if ($adminExists) {
            return $this->render('home.html.twig');
        }

        $user->setEmail('admin@admin.com');
        $user->setPassword(
            $passwordEncoder->encodePassword($user, 'admin')
        );

        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($user);
        $entityManager->flush();

        return $this->render('home.html.twig');
    }
}
