<?php

namespace App\Controller;

use App\Entity\Transporter;
use App\Form\TransporterType;
use App\Repository\TransporterRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/transporter")
 */
class TransporterController extends AbstractController
{
    /**
     * @Route("/", name="transporter_index", methods={"GET"})
     */
    public function index(TransporterRepository $transporterRepository): Response
    {
        return $this->render('transporter/index.html.twig', [
            'transporters' => $transporterRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="transporter_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $transporter = new Transporter();
        $form = $this->createForm(TransporterType::class, $transporter);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($transporter);
            $entityManager->flush();

            return $this->redirectToRoute('transporter_index');
        }

        return $this->render('transporter/new.html.twig', [
            'transporter' => $transporter,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="transporter_show", methods={"GET"})
     */
    public function show(Transporter $transporter): Response
    {
        return $this->render('transporter/show.html.twig', [
            'transporter' => $transporter,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="transporter_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Transporter $transporter): Response
    {
        $form = $this->createForm(TransporterType::class, $transporter);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('transporter_index');
        }

        return $this->render('transporter/edit.html.twig', [
            'transporter' => $transporter,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="transporter_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Transporter $transporter): Response
    {
        if ($this->isCsrfTokenValid('delete'.$transporter->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($transporter);
            $entityManager->flush();
        }

        return $this->redirectToRoute('transporter_index');
    }
}
