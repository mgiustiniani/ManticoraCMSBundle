<?php

namespace Manticora\CMSBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class TemplateType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('name');
        $builder->add('body', 'ace_editor', array(
            'wrapper_attr' => array(), // aceeditor wrapper html attributes.
            'width' => 500,
            'height' => 400,
            'font_size' => 12,
            'mode' => 'ace/mode/html', // every single default mode must have ace/mode/* prefix
            'theme' => 'ace/theme/xcode', // every single default theme must have ace/theme/* prefix
            'tab_size' => null,
            'read_only' => null,
            'use_soft_tabs' => null,
            'use_wrap_mode' => null,
            'show_print_margin' => null,
            'highlight_active_line' => null
        ));
        $builder->add('routes','collection', array(
            'type' =>  new StaticRouteType(),
            'allow_add' => true,
            'allow_delete' => true,
            'by_reference' => false,
        ));
        $builder->add('category','entity', array(
            'class' => 'Manticora\CMSBundle\Entity\TemplateCategory',
            'property' => 'name',
        ));

    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Manticora\CMSBundle\Entity\Template'
        ));
    }

    public function getName()
    {
        return 'cms_template';
    }
}
