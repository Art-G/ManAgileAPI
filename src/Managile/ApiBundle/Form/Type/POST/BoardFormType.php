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

class BoardFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder->add('name')
            ->add('description')
            ->add('favorite', 'checkbox', array(
                'label'     => 'favorite board',
                'required'  => false,
            ))
            ->add('archived', 'checkbox', array(
                'label'     => 'archiver le board',
                'required'  => false,
            ))
            ->add('team', 'entity', array('class' => 'ManagileApiBundle:Team'));
    }

    public function configureOptions(OptionsResolver $resolver) {
        $resolver->setDefaults(array(
            'csrf_protection' => false,
            'data_class' => 'Managile\ApiBundle\Entity\Board'
        ));
    }

    public function getName()
    {
        return '';
    }


}