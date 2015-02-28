<?php
namespace Code\ProdutoBundle\Controller;

use Code\ProdutoBundle\Form\ProdutoType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Code\ProdutoBundle\Entity\Produto;
use Code\CategoriaBundle\Entity\Categoria;
use Symfony\Component\HttpFoundation\Request;

class ProdutoController extends Controller
{
    /**
     * @Route("/", name="produto")
     * @Template()
     */
    public function indexAction()
    {
    	$em = $this->getDoctrine()->getManager();
    	$repo = $em->getRepository("CodeProdutoBundle:Produto");
    	$produtos = $repo->findAll();

        return ['produtos' => $produtos];
    }

    /**
     * @Route("/new", name="produto_new")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Produto();
        $form = $this->createForm(new ProdutoType(), $entity);

        //$form->createView() cria o form para poder ser exibido como o template
        return [
            'entity' => $entity,
            'form'   => $form->createView()
        ];
    }

    /**
     * @Route("/create/", name="produto_create")
     * @Template("CodeProdutoBundle:Produto:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new Produto();
        //amarra o ProdutoType com a entidade
        $form = $this->createForm(new ProdutoType(), $entity);
        //agora vamos relacionar os dados enviados a entidade
        $form->bind($request);

        //se o form for válido
        if($form->isValid()){
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('produto'));
        }

        return [
            'entity' => $entity,
            'form'   => $form->createView()
        ];
    }
}