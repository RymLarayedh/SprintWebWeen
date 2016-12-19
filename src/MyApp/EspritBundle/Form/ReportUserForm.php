<?php

namespace MyApp\EspritBundle\Form;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ReportUserForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder


            ->add('reportedtid',EntityType::class,array(
                'class'=>'MyAppEspritBundle:Tripprogram','choice_label'=>'idtripprogram',
                'multiple'=>false))
            ->add('reporteduid',EntityType::class,array(
                'class'=>'MyAppEspritBundle:Utilisateur','choice_label'=>'username',
                'multiple'=>false))
            ->add('userid',EntityType::class,array(
                'class'=>'MyAppEspritBundle:Utilisateur','choice_label'=>'username',
                'multiple'=>false))
            ->setMethod('GET')
            ->add('report',SubmitType::class);
    }

    public function configureOptions(OptionsResolver $resolver)
    {

    }

    public function getName()
    {
        return 'esprit_parc_bundle_modele_form';
    }
}
