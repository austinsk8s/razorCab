<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ScheduleItemType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('scheduledInTime')
            ->add('scheduledOutTime')
            ->add('clockInTime')
            ->add('clockOutTime')
            ->add('isPickupInfoComplete')
            ->add('isDropbackInfoComplete')
            ->add('driver')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\ScheduleItem'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'appbundle_scheduleitem';
    }
}
