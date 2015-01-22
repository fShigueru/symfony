<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     * @Template()
     */
    public function indexAction()
    {
        //return $this->render('AppBundle:Default:index.html.twig', ['nome' => $nome]);
        return [];
    }

    /**
     * @Route("/run/{marca}/{modelo}", name="runpage")
     * @Template()
     */
    public function runAction($marca, $modelo)
    {
    	$carro['marca']  = $marca;
    	$carro['modelo'] = $modelo;
    	return ['carro' => $carro];
    }
}
