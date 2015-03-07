<?php

namespace Code\ProdutoBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Form\FormBuilderInterface;

class ProdutoType extends AbstractType {

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
            ->add('nome', 'text', ['label' => 'Produto', 'required' => true, 'attr' => ['class' => 'xpto']])
            ->add('descricao')
            //como está relacionado e vem multiplos valores, o symfone já sabe que é um select
                //e como é many to many ele já da a opção de multiplos selects
                //mas precisamos defirnir qual campo será impresso, então na entidade de categorias
                //definimos um metodo __toString e retornamos o valor
            ->add('categorias')
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
            ['data_class' => 'Code\ProdutoBundle\Entity\Produto']
        );
    }


    /**
     * Returns the name of this type.
     * nome do type, será o prefixo dos "name"
     *
     * @return string The name of this type
     */
    public function getName()
    {
        return "code_produtobundle_produtotype";
    }
}