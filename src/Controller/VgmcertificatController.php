<?php

namespace App\Controller;

use App\Entity\Vgmcertificat;
use App\Form\VgmcertificatType;
use App\Repository\VgmcertificatRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/vgmcertificat")
 */
class VgmcertificatController extends AbstractController
{
    /**
     * @Route("/", name="vgmcertificat_index", methods={"GET"})
     */
    public function index(VgmcertificatRepository $vgmcertificatRepository): Response
    {
        return $this->render('vgmcertificat/index.html.twig', [
            'vgmcertificats' => $vgmcertificatRepository->findBy([
                "isdelete"=>false
            ]),
        ]);
    }

    /**
     * @Route("/new", name="vgmcertificat_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {

        $vgmcertificat = new Vgmcertificat();
        $form = $this->createForm(VgmcertificatType::class, $vgmcertificat);
        $form->handleRequest($request);



        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($vgmcertificat);
            $entityManager->flush();

            return $this->redirectToRoute('vgmcertificat_index');
        }

        return $this->render('vgmcertificat/new.html.twig', [
            'vgmcertificat' => $vgmcertificat,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="vgmcertificat_show", methods={"GET"})
     */
    public function show(Vgmcertificat $vgmcertificat): Response
    {
        return $this->render('vgmcertificat/show.html.twig', [
            'vgmcertificat' => $vgmcertificat,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="vgmcertificat_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Vgmcertificat $vgmcertificat): Response
    {
        $form = $this->createForm(VgmcertificatType::class, $vgmcertificat);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('vgmcertificat_index');
        }

        return $this->render('vgmcertificat/edit.html.twig', [
            'vgmcertificat' => $vgmcertificat,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="vgmcertificat_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Vgmcertificat $vgmcertificat): Response
    {
        if ($this->isCsrfTokenValid('delete'.$vgmcertificat->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($vgmcertificat);
            $entityManager->flush();
        }

        return $this->redirectToRoute('vgmcertificat_index');
    }
}
