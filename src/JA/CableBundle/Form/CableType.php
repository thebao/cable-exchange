<?php

namespace JA\CableBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class CableType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name',           'text')
            ->add('description',     'textarea')
            ->add('amps',           'number', array('required' => false))
            ->add('volts',          'number', array('required' => false))
            ->add('length',         'number', array('required' => false))
            ->add('type',           'choice', array(
                    'choices' => array(
                        1 => 'Téléphone',
                        2 => 'Portable',
                        3 => 'Tablette'
                    ),
                    'required' => true)
            )
            ->add('reset',          'reset')
            ->add('save',           'submit');
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'JA\CableBundle\Entity\Cable'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'ja_cablebundle_cable';
    }
}
