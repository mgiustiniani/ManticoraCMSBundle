<?php

namespace Manticora\CMSBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

abstract class RouteType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('name');
        $builder->add('path');
        $builder->add('routeCollection', 'entity', array(
            'class' => 'Manticora\CMSBundle\Entity\RouteCollection',
            'property' => 'title',
        ));
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Manticora\CMSBundle\Entity\Route'
        ));
    }

    public function getName()
    {
        return 'cms_route';
    }

}
