<?php
/**
 * Created by PhpStorm.
 * User: Arthur
 * Date: 05/12/2015
 * Time: 23:26
 */

namespace Managile\ApiBundle\Form\Type\POST;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\HttpFoundation\Request;

class MemberFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder->add('team', 'entity', array('class' => 'ManagileApiBundle:Team'))
            ->add('user', 'entity', array('class' => 'ManagileApiBundle:FosUser'))
            ->add('role', 'entity', array('class' => 'ManagileApiBundle:TeamRole'));
    }

    public function configureOptions(OptionsResolver $resolver) {
        $resolver->setDefaults(array(
            'csrf_protection' => false,
            'data_class' => 'Managile\ApiBundle\Entity\Member'
        ));
    }

    public function getName()
    {
        return '';
    }


}