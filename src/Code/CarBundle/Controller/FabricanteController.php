<?php
namespace Code\CarBundle\Controller;

use Code\CarBundle\Form\FabricanteType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Code\CarBundle\Entity\Carro;
use Code\CarBundle\Entity\Fabricante;
use Symfony\Component\HttpFoundation\Request;

/**
 * @Route("/fabricantes")
 */
class FabricanteController extends Controller
{
    /**
     * @Route("", name="listaFabricantes")
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
     * @Route("/save", name="fabricante_new")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Fabricante();
        //passamos o type e a entidade
        $form = $this->createForm(new FabricanteType(), $entity);

        return [
            'entity' => $entity,
            'form'   => $form->createView()
        ];
    }

    /**
     * @Route("/create", name="fabricante_create")
     * @Template()
     */
    public  function createAction(Request $request)
    {
        $entity = new Fabricante();
        $form = $this->createForm(new FabricanteType(), $entity);
        $form->bind($request);

        if($form->isValid()){
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl("listaFabricantes"));
        }

        return[
            'entity' => $entity,
            'form'   => $form->createView()
        ];
    }

    /**
     * @Route("/{id}/edit", name="fabricante_edit")
     * @Template("CodeCarBundle:Fabricante:edit.html.twig")
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository("CodeCarBundle:Fabricante")->find($id);

        if(!$entity)
            throw $this->createNotFoundException("Registro não encontrado");

        $form = $this->createForm(new FabricanteType(), $entity);

        return [
            'entity' => $entity,
            'form'   => $form->createView()
        ];
    }

    /**
     * @Route("/{id}/update", name="fabricante_update")
     * @Template("CodeCarBundle:Fabricante:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository("CodeCarBundle:Fabricante")->find($id);

        if(!$entity)
            throw $this->createNotFoundException("Registro não encontrado");

        $form = $this->createForm(new FabricanteType(), $entity);

        $form->bind($request);

        if($form->isValid()){
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('listaFabricantes'));
        }

        return [
            'entity' => $entity,
            'form'   => $form->createView()
        ];
    }

    /**
     * @Route("/{id}/delete", name="fabricante_delete")
     * @Template()
     */
    public function deleteAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();
        $entity = $em->getRepository("CodeCarBundle:Fabricante")->find($id);

        if(!$entity)
            throw $this->createNotFoundException("Registro não encontrado");

        $em->remove($entity);
        $em->flush();

        return $this->redirect($this->generateUrl('listaFabricantes'));
    }




}
