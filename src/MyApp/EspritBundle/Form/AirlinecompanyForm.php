<?php
/**
 * Created by PhpStorm.
 * User: ElarbiMohamedAymen
 * Date: 19/11/2016
 * Time: 10:34
 */

namespace MyApp\EspritBundle\Form;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;


class AirlinecompanyForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('Name')
            ->add('number',EntityType::class,array(
                'class'=>'MyApp\EspritBundle\Entity\Address','data'=>'number'
            ))
            ->add('street')
            ->add('zipcode')
            ->add('Ajouter',SubmitType::class)
            ->getForm();

    }

    public function configureOptions(OptionsResolver $resolver)
    {

    }



}