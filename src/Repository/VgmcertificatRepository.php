<?php

namespace App\Repository;

use App\Entity\Vgmcertificat;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Vgmcertificat|null find($id, $lockMode = null, $lockVersion = null)
 * @method Vgmcertificat|null findOneBy(array $criteria, array $orderBy = null)
 * @method Vgmcertificat[]    findAll()
 * @method Vgmcertificat[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class VgmcertificatRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Vgmcertificat::class);
    }

    // /**
    //  * @return Vgmcertificat[] Returns an array of Vgmcertificat objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('v')
            ->andWhere('v.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('v.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */




}
