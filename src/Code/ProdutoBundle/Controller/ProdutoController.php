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
            //chamando o service de produtos
            $produtoServices = $this->get('code_produto.service.produto');
            //usando o metodo insert
            $entity = $produtoServices->insert($entity);

            return $this->redirect($this->generateUrl('produto'));
        }

        return [
            'entity' => $entity,
            'form'   => $form->createView()
        ];
    }

    /**
     * @Route("/{id}/edit", name="produto_edit")
     * @Template()
     */
    public function editAction($id)
    {
        //quando for editar, primeiro precisamos buscar oque vamos editar no banco de dados
        $em = $this->getDoctrine()->getManager();
        $entity =  $em->getRepository("CodeProdutoBundle:Produto")->find($id);

        if(!$entity)
            throw $this->createNotFoundException("Registro não encontrado");

        //amarramos o form e ela já preenche o form, por causa da entity
        $form = $this->createForm(new ProdutoType(), $entity);
        return [
            'entity' => $entity,
            'form'   => $form->createView()
        ];
    }

    /**
     * @Route("/{id}/update", name="produto_update")
     * @Template("CodeProdutoBundle:Produto:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $entity =  $em->getRepository("CodeProdutoBundle:Produto")->find($id);

        if(!$entity)
            throw $this->createNotFoundException("Registro não encontrado");

        $form = $this->createForm(new ProdutoType(), $entity);
        //vamos fazer um bind com as informações enviadas pelo form com a entidade estanciada
        $form->bind($request);

        if($form->isValid()){
            $produtoService = $this->get("code_produto.service.produto");
            $entity = $produtoService->update($entity);
            return $this->redirect($this->generateUrl('produto'));
        }

        return [
            'entity' => $entity,
            'form'   => $form->createView()
        ];
    }

    /**
     * @Route("/{id}/delete", name="produto_delete")
     * @Template()
     */
    function deleteAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $entity =  $em->getRepository("CodeProdutoBundle:Produto")->find($id);

        if(!$entity)
            throw $this->createNotFoundException("Registro não encontrado");

        $produtoService = $this->get("code_produto.service.produto");
        $produtoService->delete($entity);

        return $this->redirect($this->generateUrl('produto'));

    }
}