<?php

namespace MyApp\EspritBundle\Form;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CityForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

            $builder
                ->add('Name')

                ->add('idcountry',EntityType::class,array(
                    'class'=> 'MyApp\EspritBundle\Entity\Country',
                    'choice_label'=>'name',
                    'multiple'=> false ))
                ->add('add',SubmitType::class)
            ;

        }



    public function configureOptions(OptionsResolver $resolver)
    {

    }

    public function getName()
    {
        return 'my_app_esprit_bundle_city_form';
    }


}
