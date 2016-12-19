<?php

namespace MyApp\EspritBundle\Form;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;


class HotelForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $builder
            ->add('name')
            ->add('stars')
            ->add('rating')
            ->add('longitude')
            ->add('latitude')
            ->add('pricebynight')

            ->add('idaddress',EntityType::class,array('class'=>'MyAppEspritBundle:Address','choice_label'=>'idaddress','multiple'=>false))
        ->add('ajouter',SubmitType::class);
    }

    public function configureOptions(OptionsResolver $resolver)
    {

    }

    public function getName()
    {
        return 'my_app_esprit_bundle_hotel_form';
    }
}
