<?php

namespace Code\CarBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class CarController extends Controller
{
    /**
     * @Route("")
     * @Template()
     */
    public function indexAction()
    {
    	//lista de carros
    	$cars[0]['marca'] = "GM";
    	$cars[0]['modelo'] = "Cobalt";

    	$cars[1]['marca'] = "Honda";
    	$cars[1]['modelo'] = "City";

    	$cars[2]['marca'] = "Jac Motors";
    	$cars[2]['modelo'] = "J3 Turin";

    	$cars[3]['marca'] = "Peugeot";
    	$cars[3]['modelo'] = "207 Sedan";

    	$cars[4]['marca'] = "Volkswagen";
    	$cars[4]['modelo'] = "Polo Sedan";

        return ['cars' => $cars];
    }

}
