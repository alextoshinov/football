<?php

namespace AWD\FootballBundle\Form;
use AWD\FootballBundle\Entity\Player;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class PlayerType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('type', 'choice', array('choices' => Player::getTypes(), 'expanded' => true))
            ->add('first_name', 'text', array(
                'attr' => array(
                 'class' => 'form-control'
                )
           ))
            ->add('last_name', 'text', array(
                'attr' => array(
                 'class' => 'form-control'
                )
           ))
            ->add('age', 'text', array(
                'attr' => array(
                 'class' => 'form-control'
                )
           ))
            ->add('team')
           // ->add('token')
            ->add('is_penalized')
            ->add('is_activated')
            ->add('expires_at')
            //->add('created_at')
            //->add('updated_at')
           
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AWD\FootballBundle\Entity\Player'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'player';
    }
}
