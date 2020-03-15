<?php

namespace App\Form;

use App\Entity\Vgmcertificat;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class VgmcertificatType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('requestTime')
            ->add('validationTime')
            ->add('ticketNumber')
            ->add('netWeight')
            ->add('tareWeight')
            ->add('booking')
            ->add('waybill')
            ->add('consignee')
            ->add('containerNumber')
            ->add('cargoType')
            ->add('containerSize')
            ->add('sealNumber')
            ->add('natureOfGoods')
            ->add('companyId')
            ->add('agreementNumber')
            ->add('certifyingOfficer')
            ->add('validatingOfficer')
            ->add('weighbridge')
            ->add('transporter')
            ->add('driver')
            ->add('truckNumber')
            ->add('tvfNumber')
            ->add('tvfDate')
            ->add('weightingDate1')
            ->add('weightingDate2')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Vgmcertificat::class,
        ]);
    }
}
