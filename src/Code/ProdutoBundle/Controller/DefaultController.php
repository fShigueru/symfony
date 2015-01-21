<?php

namespace Code\ProdutoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Code\ProdutoBundle\Entity\Produto;


class DefaultController extends Controller
{
    /**
     * @Route("/hello/{name}")
     * @Template()
     */
    public function indexAction($name)
    {
        return ['name' => $name];
    }
    /**
     * @Route("/doctrine")
     * @Template()
     */
    public function testeAction()
    {
    	$produto = new Produto();
    	#$produto->setNome("Notebook B");
    	#$produto->setDescricao("Essa é a descrição do notebook B");
    	//chama o entyti manager
    	$em = $this->getDoctrine()->getManager();
    	//persiste a entidade
    	#$em->persist($produto);
    	//grava
    	#$em->flush();

        //Find all
        //Repository da entidade Produto
        //$repo = $em->getRepository("Code\ProdutoBundle\Entity\Produto");
        $repo = $em->getRepository("CodeProdutoBundle:Produto");
        //busca todos
        $produtos = $repo->findAll();

    	return ['produtos' => $produtos];
    }
}
