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
        $builder->add('name', 'text')
            ->add('description', 'text');
    }

    public function configureOptions(OptionsResolver $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'ManAgile\ApiBundle\Entity\Board',
            'csrf_protection' => false,
            'method' => 'POST'
        ));
    }

    public function getName()
    {
        return 'board';
    }


}