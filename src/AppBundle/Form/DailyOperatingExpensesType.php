<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class DailyOperatingExpensesType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('fuelUsed')
            ->add('milesDriven')
            ->add('repairs')
            ->add('maintenance')
            ->add('supplies')
            ->add('otherExpenses')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\DailyOperatingExpenses'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'appbundle_dailyoperatingexpenses';
    }
}
