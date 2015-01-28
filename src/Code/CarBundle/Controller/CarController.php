<?php
namespace Code\CarBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Code\CarBundle\Entity\Carro;

class CarController extends Controller
{
    /**
     * @Route("")
     * @Template()
     */
    public function indexAction()
    {

        //chama o entyti manager
        $em = $this->getDoctrine()->getManager();
        //Repository da entidade Carro
        $repo = $em->getRepository("CodeCarBundle:Carro");
        //busca todos
        $cars = $repo->findAll();

        return ['cars' => $cars];
    }

    /**
     * @Route("/save")
     * @Template()
     */
    public function saveAction()
    {

        //lista de carros
        $cars[0]['marca'] = "GM";
        $cars[0]['modelo'] = "Cobalt";
        $cars[0]['ano'] = 2008;
        $cars[0]['cor'] = "prata";

        $cars[1]['marca'] = "Honda";
        $cars[1]['modelo'] = "City";
        $cars[1]['ano'] = 2012;
        $cars[1]['cor'] = "vermelho";

        $cars[2]['marca'] = "Jac Motors";
        $cars[2]['modelo'] = "J3 Turin";
        $cars[2]['ano'] = 2014;
        $cars[2]['cor'] = "preto";

        $cars[3]['marca'] = "Peugeot";
        $cars[3]['modelo'] = "207 Sedan";
        $cars[3]['ano'] = 2010;
        $cars[3]['cor'] = "azul";

        $cars[4]['marca'] = "Volkswagen";
        $cars[4]['modelo'] = "Polo Sedan";
        $cars[4]['ano'] = 2007;
        $cars[4]['cor'] = "preto";

        foreach ($cars as $key => $data) {
            $carro = new Carro();
            $carro->setModelo($data["modelo"]);
            $carro->setFabricante($data["marca"]);
            $carro->setAno($data["ano"]);
            $carro->setCor($data["cor"]);
            //chama o entyti manager
            $em = $this->getDoctrine()->getManager();
            //persiste a entidade
            $em->persist($carro);
            //grava
            $em->flush();
        }

        echo "Gravou";
        die;
    }
}
