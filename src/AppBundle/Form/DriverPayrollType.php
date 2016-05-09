<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class DriverPayrollType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('pickupTime')
            ->add('dropOffTime')
            ->add('breakHours')
            ->add('numJourneys')
            ->add('workMilesDriven')
            ->add('leisureMilesDriven')
            ->add('faresCollected')
            ->add('tipsCollected')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\DriverPayroll'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'appbundle_driverpayroll';
    }
}
