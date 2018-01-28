<?php

namespace App\Controller;

use Doctrine\ORM\NonUniqueResultException;
use Doctrine\ORM\NoResultException;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BreadController extends Controller
{

    /**
     * @Route("/")
     *
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @throws \LogicException
     */
    public function current()
    {
        try {
            $activeBread = $this->getDoctrine()->getRepository('App:Bread')->findActiveBread();
        } catch (NoResultException|NonUniqueResultException $exception) {
            return $this->render('no_active_bread.html.twig');
        }

        return $this->render('active_bread.html.twig', ['bread' => $activeBread]);
    }
}