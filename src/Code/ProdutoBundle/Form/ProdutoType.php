<?php

namespace Code\ProdutoBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Form\FormBuilderInterface;

class ProdutoType extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        //apartir de uma array podemos definir argumentos para nossos forms
        $builder
            ->add('nome', 'text', ['label' => 'Produto', 'required' => true, 'attr' => ['class' => 'xpto']])
            ->add('descricao')
        ;
    }

    public function setDefaulOptions(OptionsResolverInterface $resolver)
    {
        //dessa forma amarramos o form com a entidade
        $resolver->setDefaults(
            ['data_class' => 'Code\ProdutoBundle\Entity\Produto']
        );
    }


    /**
     * Returns the name of this type.
     *
     * @return string The name of this type
     */
    public function getName()
    {
        return "code_produtobundle_produtotype";
    }
}