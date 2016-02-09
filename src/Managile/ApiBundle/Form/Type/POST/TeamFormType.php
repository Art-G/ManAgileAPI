<?php
/**
 * Created by PhpStorm.
 * User: Arthur
 * Date: 20/01/2016
 * Time: 14:36
 */

namespace Managile\ApiBundle\Form\Type\POST;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\HttpFoundation\Request;

class TeamFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder->add('name')
            ->add('description');
    }

    public function configureOptions(OptionsResolver $resolver) {
        $resolver->setDefaults(array(
            'csrf_protection' => false,
            'data_class' => 'ManAgile\ApiBundle\Entity\Board'
        ));
    }

    public function getName()
    {
        return '';
    }


}