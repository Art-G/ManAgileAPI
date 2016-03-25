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

class TaskListFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder->add('name')
            ->add('board', 'entity', array('class' => 'ManagileApiBundle:Board'))
            ->add('position', 'integer')
            ->add('archived', 'checkbox', array(
                'label'     => 'archiver la list',
                'required'  => false,
            ));
    }

    public function configureOptions(OptionsResolver $resolver) {
        $resolver->setDefaults(array(
            'csrf_protection' => false,
            'data_class' => 'Managile\ApiBundle\Entity\TaskList'
        ));
    }

    public function getName()
    {
        return '';
    }


}