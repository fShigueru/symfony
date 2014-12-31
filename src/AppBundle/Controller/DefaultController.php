<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    /**
     * @Route("/{nome}", name="homepage")
     */
    public function indexAction($nome)
    {
        return $this->render('AppBundle:Default:index.html.twig', ['nome' => $nome]);
    }

    /**
     * @Route("/run/{marca}/{modelo}", name="homepage")
     */
    public function runAction($marca, $modelo)
    {
    	$carro['marca']  = $marca;
    	$carro['modelo'] = $modelo;
    	return $this->render('AppBundle:Default:run.html.twig', ['carro' => $carro]);
    }
}
