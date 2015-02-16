<?php
namespace Code\CarBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Code\CarBundle\Entity\Carro;
use Code\CarBundle\Entity\Fabricante;

class FabricanteController extends Controller
{
    /**
     * @Route("/fabricantes", name="listaFabricantes")
     * @Template()
     */
    public function indexAction()
    {
        //chama o entyti manager
        $em = $this->getDoctrine()->getManager();
        $repo = $em->getRepository("CodeCarBundle:Fabricante");
        //busca todos
        $fabricantes = $repo->findAll();

        return ['fabricantes' => $fabricantes];
    }

    /**
     * @Route("/fabricante/save")
     * @Template()
     */
    public function saveAction()
    {
        $fabricante = new Fabricante();
        $fabricante->setNome("Kia Motors Corporation");

        $fabricante2 = new Fabricante();
        $fabricante2->setNome("Lincoln Veículos");

        $fabricante3 = new Fabricante();
        $fabricante3->setNome("Lotus Cars Limited");

        //chama o entyti manager
        $em = $this->getDoctrine()->getManager();

        $em->persist($fabricante);
        $em->persist($fabricante2);
        $em->persist($fabricante3);
        $em->flush();

        return $this->redirect($this->generateUrl('listaFabricantes'));
    }
}
