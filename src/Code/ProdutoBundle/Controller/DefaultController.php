<?php

namespace Code\ProdutoBundle\Controller;

use Code\ProdutoBundle\Entity\Produto;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Code\CategoriaBundle\Entity\Categoria;
use Code\ProdutoBundle\Entity\ProdutoDetalhe;


class DefaultController extends Controller
{
    /**
     * @Route("/hello/{name}")
     * @Template()
     */
    public function indexAction($name)
    {
        return ['name' => $name];
    }
    /**
     * @Route("/doctrine")
     * @Template()
     */
    public function testeAction()
    {

        //teste ManyToMany
        $categoriaOne = new Categoria();
        $categoriaOne->setNome("Categoria Eletronicos");
        $categoriaOne->setDescricao("Descrição da categoria eletronicos");

        $categoriaTwo = new Categoria();
        $categoriaTwo->setNome("Categoria Informatica");
        $categoriaTwo->setDescricao("Descrição da categoria de Informatica");


        //inserindo um novo produto
    	$produto = new Produto();
    	$produto->setNome("Notebook C");
    	$produto->setDescricao("Essa é a descrição do notebook C");
        //adicionando as categorias a produto
        $produto->addCategoria($categoriaOne);
        $produto->addCategoria($categoriaTwo);

        //inserindo o detalhe do produto, que está relacionado a o produto
        $produtoDetalhe = new ProdutoDetalhe();
        $produtoDetalhe->setPeso(1);
        $produtoDetalhe->setLargura(15);
        $produtoDetalhe->setAltura(10);

        //inserir o produtoDetalhe no produto
        //$produto->setDetalhe($produtoDetalhe);

    	//chama o entyti manager
    	$em = $this->getDoctrine()->getManager();

        //busca uma categoria
        // $repoCategoria = $em->getRepository("CodeCategoriaBundle:Categoria");
        // $produto->setCategoria($repoCategoria->find(1));

        //persiste na primeira categoria
        $em->persist($categoriaOne);
        //persiste na segunda categoria
        $em->persist($categoriaTwo);
        //persiste a entidade produtoDetalhe
       // $em->persist($produtoDetalhe);
    	//persiste a entidade produto
    	$em->persist($produto);
    	//grava
    	$em->flush();

        //Find all
        //Repository da entidade Produto
        //$repo = $em->getRepository("Code\ProdutoBundle\Entity\Produto");
        $repo = $em->getRepository("CodeProdutoBundle:Produto");
        //busca todos
        $produtos = $repo->findAll();
        //metodo criado no ProdutoRepository
        #$produtos = $repo->getProdutoIdMaiorQue(1);

    	return ['produtos' => $produtos];
    }
}
