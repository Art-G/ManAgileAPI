<?php
/**
 * Created by PhpStorm.
 * User: Arthur
 * Date: 05/12/2015
 * Time: 23:26
 */

namespace Managile\ApiBundle\Form\Type\PUT;


use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\HttpFoundation\Request;

class BoardFormType extends \Managile\ApiBundle\Form\Type\POST\BoardFormType
{
    public function buildForm(FormBuilderInterface $builder, array $options) {
        parent::buildForm($builder, $options);

        //$builder->remove('media');
    }

    public function configureOptions(OptionsResolver $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'Managile\ApiBundle\Entity\Board',
            'csrf_protection' => false,
            'method' => 'PUT'
        ));
    }

    public function getName()
    {
        return 'board';
    }


}