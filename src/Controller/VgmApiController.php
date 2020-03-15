<?php

namespace App\Controller;

use App\Entity\CheeseListing;
use App\Entity\Vgmcertificat;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class VgmApiController extends AbstractController
{
    /**
     * @Route("/vgm/api", name="vgm_api")
     */
    public function index()
    {
        return $this->render('vgm_api/index.html.twig', [
            'controller_name' => 'VgmApiController',
        ]);
    }

    /**
     * @Route(
     *     name="vgm_listing",
     *     path="api/retirerCertificat",
     *     methods={"POST"},
     *     defaults={
     *       "_controller"="\App\Controller\VgmApiController::retirerCertificat",
     *       "_api_resource_class"="App\Entity\Vgmcertificat",
     *       "_api_item_operation_name"="vgmretrait"
     *     }
     *   )
     */
    public function retirerCertificat(Vgmcertificat $data, ObjectManager $manager): Vgmcertificat
    {
        if ($data->getCargoType() === false) {
            $data->getRequestTime();
            $manager->persist($data);
            $manager->flush();

            // Image that we can publish a cheese advert to a social medium platform:
            // $cheeseListingService->publishToFacebook($cheeseListing);
        }
        return $data;
    }
}
