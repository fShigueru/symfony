<?php
namespace Code\CarBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Form\FormBuilderInterface;

/**
 * Class FabricanteType
 * @package Code\CarBundle\Form
 */
class FabricanteType extends AbstractType {

    /**
     * definimos os campos, e trabalhamos com seus tipos..
     *
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        //apartir de uma array podemos definir argumentos para nossos forms
        $builder
            ->add('nome', 'text', ['label' => 'Fabricante', 'required' => true])
        ;
    }

    /**
     * Faz a ligação entre o form e a entidade
     *
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaulOptions(OptionsResolverInterface $resolver)
    {
        //dessa forma amarramos o form com a entidade
        $resolver->setDefaults(
            ['data_class' => 'Code\CarBundle\Entity\Fabricante']
        );
    }


    /**
     * Returns the name of this type.
     *
     * @return string The name of this type
     */
    public function getName()
    {
        return "code_carbundle_fabricatetype";
    }
}