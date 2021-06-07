<?php

namespace App\Controller;

use App\Entity\Concesionario;
use App\Form\ConcesionarioType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/concesionario")
 */
class ConcesionarioController extends AbstractController
{
    /**
     * @Route("/", name="concesionario_index", methods={"GET"})
     */
    public function index(): Response
    {
        $concesionarios = $this->getDoctrine()
            ->getRepository(Concesionario::class)
            ->findAll();

        return $this->render('concesionario/index.html.twig', [
            'concesionarios' => $concesionarios,
        ]);
    }

    /**
     * @Route("/new", name="concesionario_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $concesionario = new Concesionario();
        $form = $this->createForm(ConcesionarioType::class, $concesionario);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($concesionario);
            $entityManager->flush();

            return $this->redirectToRoute('concesionario_index');
        }

        return $this->render('concesionario/new.html.twig', [
            'concesionario' => $concesionario,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="concesionario_show", methods={"GET"})
     */
    public function show(Concesionario $concesionario): Response
    {
        return $this->render('concesionario/show.html.twig', [
            'concesionario' => $concesionario,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="concesionario_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Concesionario $concesionario): Response
    {
        $form = $this->createForm(ConcesionarioType::class, $concesionario);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('concesionario_index');
        }

        return $this->render('concesionario/edit.html.twig', [
            'concesionario' => $concesionario,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="concesionario_delete", methods={"POST"})
     */
    public function delete(Request $request, Concesionario $concesionario): Response
    {
        if ($this->isCsrfTokenValid('delete'.$concesionario->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($concesionario);
            $entityManager->flush();
        }

        return $this->redirectToRoute('concesionario_index');
    }
}
