<?php

namespace AWD\FootballBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Doctrine\ORM\EntityManager;
class GameType extends AbstractType
{
    
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        
        $builder
            ->add('team_one_id')
            ->add('team_one_score', 'text' , array('label' => 'Goal',
                                                                        'required' => false,
                                                                        'attr' => array(
                                                                        'class' => 'form-control input-goal'
                                                                        )
                ))    
            ->add('team_two_id')    
            ->add('team_two_score', 'text' , array('label' => 'Goal', 
                                                                        'required' => false,
                                                                         'attr' => array(
                                                                         'class' => 'form-control input-goal'
                                                                        )
                ))
           // ->add('expires_at')
            ->add('created_at' )
                    /*
                    ,'datetime',array(
	            'date_widget' => 'single_text',
	            //'date_format' => 'mm/dd/yy HH:MM',
	            'attr' => array('class' => 'date')
	        ))
                     * 
                     */
        ;
               
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AWD\FootballBundle\Entity\Game',
            'csrf_protection' => false
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'game';
    }
}
