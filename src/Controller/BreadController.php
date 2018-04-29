<?php

namespace App\Controller;

use App\Entity\Bread;
use App\Entity\Order;
use App\Form\BreadType;
use App\Form\OrderType;
use Doctrine\ORM\NonUniqueResultException;
use Doctrine\ORM\NoResultException;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class BreadController extends Controller
{

    /**
     * @Route("/", name="home")
     *
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @throws \LogicException
     */
    public function current()
    {
        try {
            $upcomingBake = $this->getDoctrine()->getRepository('App:Bread')->getUpcomingBake();
        } catch (NoResultException|NonUniqueResultException $exception) {
            return $this->render('no_active_bread.html.twig');
        }

        return $this->render('upcoming_bake.html.twig', ['upcomingBake' => $upcomingBake]);
    }

    /**
     * @Route("/create-upcoming-bake", name="create_upcoming_bake")
     *
     * @param \Symfony\Component\HttpFoundation\Request $request
     *
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @throws \LogicException
     * @throws \Symfony\Component\Form\Exception\LogicException
     */
    public function createUpcomingBake(Request $request)
    {
        $bread = new Bread();
        $form = $this->createForm(BreadType::class, $bread);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $bread = $form->getData();

            $em = $this->getDoctrine()->getManager();
            $em->persist($bread);
            $em->flush();

            return $this->redirectToRoute('home');
        }

        return $this->render('create_upcoming_bake.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/claim-a-bread/{id}", name="claim_a_bread")
     *
     * @param \Symfony\Component\HttpFoundation\Request $request
     *
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @throws \LogicException
     * @throws \Symfony\Component\Form\Exception\LogicException
     */
    public function claimABread(Request $request, Bread $bread)
    {
        $order = new Order();
        $order->setBread($bread);
        $order->setUser($this->getUser());
        $form = $this->createForm(OrderType::class, $order);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $order = $form->getData();
            $order->setOrderedAt(new \DateTime());

            $em = $this->getDoctrine()->getManager();
            $em->persist($order);
            $em->flush();

            $this->addFlash(
                'success',
                'Gelukt! Bedankt voor je bestelling, alles komt voor de bakker!'
            );

            return $this->redirectToRoute('home');
        }

        return $this->render('claim_a_bread.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}