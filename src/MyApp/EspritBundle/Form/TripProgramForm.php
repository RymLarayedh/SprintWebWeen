<?php

namespace MyApp\EspritBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;

use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core;
use MyApp\EspritBundle\Form\CityForm;



class TripProgramForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder

            ->add('nbrpassenger')
            ->add('description',TextareaType::class)

           ->add('idcity',EntityType::class,array(
                'class'=>'MyApp\EspritBundle\Entity\City',
                'choice_label'=>'name',

                'multiple'=>false // = select option = liste deroulante

            ))
            ->add('idcity',EntityType::class,array(
                'class'=>'MyApp\EspritBundle\Entity\City',
                'choices'=>'idcountry.name',

                'multiple'=>false // = select option = liste deroulante

            ))
          //  ->add('idcity', CityForm::class)

         ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {

    }

    public function getName()
    {
        return 'my_app_esprit_bundle_trip_program_form';
    }
}
