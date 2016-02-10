<?php
/**
 * Created by PhpStorm.
 * User: Amaury
 * Date: 10/12/2015
 * Time: 08:00
 */

namespace Managile\ApiBundle\Form\Type\POST;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\HttpFoundation\Request;

class TaskFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder->add('name')
            ->add('description')
			->add('position')
			->add('due_date')
            ->add('archived', 'checkbox', array(
                'label'     => 'archiver la tache',
                'required'  => false,
            ))
            ->add('tasklist', 'entity', array('class' => 'ManagileApiBundle:TaskList'));
    }

    public function configureOptions(OptionsResolver $resolver) {
        $resolver->setDefaults(array(
            'csrf_protection' => false,
            'data_class' => 'Managile\ApiBundle\Entity\Task'
        ));
    }

    public function getName()
    {
        return '';
    }


}