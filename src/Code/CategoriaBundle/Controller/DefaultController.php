<?php

namespace Code\CategoriaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Code\CategoriaBundle\Entity\Categoria;

class DefaultController extends Controller
{
    /**
     * @Route("/")
     * @Template()
     */
    public function indexAction()
    {
    	//get entity Manager
    	$em = $this->getDoctrine()->getManager();

    	$repoCategoria = $em->getRepository("CodeCategoriaBundle:Categoria");
        $categorias = $repoCategoria->findAll();

        return ['categorias' => $categorias];
    }

	/**
     * @Route("/add")
     * @Template()
     */
    public function storeAction()
    {
    	$categoria = new Categoria();
    	$categoria->setNome("Eletronico");
    	$categoria->setDescricao("Descrição do eletronico");
		//EntityManeger
		$em = $this->getDoctrine()->getManager();
		$em->persist($categoria);
		$em->flush();

		return [];
    }
}
