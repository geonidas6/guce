<?php

namespace App\Controller;



use App\Entity\Vgmcertificat;
use App\Repository\VgmcertificatRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class VgmApiController extends AbstractController
{

    private $vgmcertificatRepository;

    public function __construct(VgmcertificatRepository $vgmcertificatRepository)
    {
        $this->vgmcertificatRepository = $vgmcertificatRepository;
    }

    public function __invoke(Request $request)
    {


        $entityManager = $this->getDoctrine()->getManager();

        $ticketNumber = $request->getContent();

       $vgm =  $this->vgmcertificatRepository->findOneBy([
            "ticketNumber"=>$ticketNumber,
           "isdelete"=>false
        ]);

       if (!empty($vgm)) {
           $vgm->setIsdelete(true);
           $entityManager->flush();
           return $this->json([
               'responseDate'=>new \DateTime(),
               'ticketNum'=>$ticketNumber,
               'resultCode'=>0
           ],200);

       }else
           return $this->json([
               'responseDate'=>new \DateTime(),
               'ticketNum'=>$ticketNumber,
               'cancelCode'=>4,
               'cancelReason'=>'ticketNum Not found'
           ],200);
        return $this->json([
            "GET IN"
        ]);
    }


}
