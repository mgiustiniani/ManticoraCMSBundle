<?php

namespace Manticora\CMSBundle\Form\Type;

use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class StaticRouteType extends RouteType
{

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Manticora\CMSBundle\Entity\StaticRoute'
        ));
    }

    public function getName()
    {
        return 'cms_route';
    }

}
