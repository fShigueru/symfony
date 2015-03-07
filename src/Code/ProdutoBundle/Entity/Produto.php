<?php
namespace Code\ProdutoBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Code\ProdutoBundle\Entity\ProdutoRepository")
 */
class Produto
{

	/**
	 *@var integer
	 *
	 * @ORM\Column(name="id", type="integer")
	 * @ORM\Id
	 * @ORM\GeneratedValue(strategy="AUTO")
	 */
	private $id;

	/**
	 *@var string
	 *
	 * @ORM\Column(name="nome", type="string" ,length=255)
	 */
	private $nome;

	/**
	 *@var string
	 *
	 * @ORM\Column(name="descricao", type="text")
	 */
	private $descricao;

//	/**
//     * @ORM\OneToOne(targetEntity="ProdutoDetalhe")
//     * @ORM\JoinColumn(name="produto_detalhe_id", referencedColumnName="id")
//     */
	private $detalhe;

	/**
     * @ORM\ManyToMany(targetEntity="Code\CategoriaBundle\Entity\Categoria", inversedBy="produtos")
     * @ORM\JoinTable(name="categorias_produtos",
     *      joinColumns={@ORM\JoinColumn(name="produto_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="categoria_id", referencedColumnName="id")}
     *      )
     **/
	private $categorias;

	//vai inicializar a collection de produtos
	public function __construct()
	{
		$this->categorias = new ArrayCollection();
	}

	public function getCategorias()
	{
	    return $this->categorias;
	}

	public function addCategoria($categoria)
	{
		//dessa forma informamos que o lado mandante é o produto
	    //$categoria->addProduto($this);
        $this->categorias[] = $categoria;
	}


	public function getId()
	{
	    return $this->id;
	}

	public function setId($id)
	{
	    $this->id = $id;
	}

	public function getNome()
	{
	    return $this->nome;
	}

	public function setNome($nome)
	{
	    $this->nome = $nome;
	}

	public function getDescricao()
	{
	    return $this->descricao;
	}

	public function setDescricao($descricao)
	{
	    $this->descricao = $descricao;
	}

	public function getDetalhe()
	{
	    return $this->detalhe;
	}

	public function setDetalhe($detalhe)
	{
	    $this->detalhe = $detalhe;
	}
}
