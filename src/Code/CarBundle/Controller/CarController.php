<?php
namespace Code\CarBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Code\CarBundle\Entity\Carro;
use Code\CarBundle\Entity\Fabricante;

class CarController extends Controller
{
    /**
     * @Route("", name="listaCarros")
     * @Template()
     */
    public function indexAction()
    {

        //chama o entyti manager
        $em = $this->getDoctrine()->getManager();
        //Repository da entidade Carro
        $repo = $em->getRepository("CodeCarBundle:Carro");
        //busca todos
        $carros = $repo->findAll();

        return ['carros' => $carros];
    }

    /**
     * @Route("/save")
     * @Template()
     */
    public function saveAction()
    {
        //chama o entyti manager
        $em = $this->getDoctrine()->getManager();

        $repo = $em->getRepository("CodeCarBundle:Fabricante");

        //busca fabricantes
        $fabricante1 = $repo->find(1);
        $fabricante2 = $repo->find(2);
        $fabricante3 = $repo->find(3);

        $carro = new Carro();
        $carro->setModelo("Sportage");
        $carro->setFabricante($fabricante1);
        $carro->setAno(2007);
        $carro->setCor("Preto");

        $carro2 = new Carro();
        $carro2->setModelo("Lincoln Mark LT");
        $carro2->setFabricante($fabricante2);
        $carro2->setAno(2006);
        $carro2->setCor("Prata");

        $carro3 = new Carro();
        $carro3->setModelo("Lotus 61");
        $carro3->setFabricante($fabricante3);
        $carro3->setAno(2011);
        $carro3->setCor("Branco");

        //persiste a entidade
        $em->persist($carro);
        $em->persist($carro2);
        $em->persist($carro3);
        //grava
        $em->flush();

        return $this->redirect($this->generateUrl('listaCarros'));
    }

}
