<?php

namespace MyApp\EspritBundle\Form;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FideliteForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('userid',EntityType::class,array(
                'class'=>'MyAppEspritBundle:User','choice_label'=>'username',
                'multiple'=>false))
            ->add('trip1id',EntityType::class,array(
                'class'=>'MyAppEspritBundle:Tripprogram','choice_label'=>'idtripprogram',
                'multiple'=>false))
            ->add('trip2id',EntityType::class,array(
                'class'=>'MyAppEspritBundle:Tripprogram','choice_label'=>'idtripprogram',
                'multiple'=>false))
            ->add('trip3id',EntityType::class,array(
                'class'=>'MyAppEspritBundle:Tripprogram','choice_label'=>'idtripprogram',
                'multiple'=>false))
            ->setMethod('GET')
            ->add('add',SubmitType::class);
    }

    public function configureOptions(OptionsResolver $resolver)
    {

    }

    public function getName()
    {
        return 'esprit_parc_bundle_modele_form';
    }
}
