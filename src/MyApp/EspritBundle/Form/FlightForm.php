<?php

namespace MyApp\EspritBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;


use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class FlightForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder

            ->add('arrivaldate',DateType::class)
            ->add('departuredate',DateType::class)
            ->add('departuretime',DateType::class)
            ->add('arrivaltime',DateType::class)
            ->add('idarrivalcity',EntityType::class,array(
                'class'=>'MyApp\EspritBundle\Entity\City',
                'choice_label'=>'name',
                'multiple'=>false // = select option = liste deroulante

            ))
            ->add('iddeparturecity',EntityType::class,array(
                'class'=>'MyApp\EspritBundle\Entity\City',
                'choice_label'=>'name',
                'multiple'=>false // = select option = liste deroulante

            ))
            ->add('idairlinecompany',EntityType::class,array(
                'class'=>'MyApp\EspritBundle\Entity\Airlinecompany',
                'choice_label'=>'name',
                'multiple'=>false // = select option = liste deroulante

            ))
            ->add('price');
         //   ->add('text',TextareaType::class);
        //  ->add('Add',SubmitType::class);
    }

    public function configureOptions(OptionsResolver $resolver)
    {

    }

    public function getName()
    {
        return 'my_app_esprit_bundle_flight_form';
    }
}
