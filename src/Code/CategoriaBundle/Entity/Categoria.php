<?php
namespace Code\CategoriaBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table()
 * @ORM\Entity()
 */
class Categoria
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
	 * @ORM\Column(name="name", type="string" ,length=255)
	 */
	private $nome;

	/**
	 *@var string
	 *
	 * @ORM\Column(name="descricao", type="text")
	 */
	private $descricao;

	/**
	* @ORM\ManyToMany(targetEntity="Code\ProdutoBundle\Entity\Produto", inversedBy="categorias")
	* @ORM\JoinTable(name="categorias_produtos",
	*      joinColumns={@ORM\JoinColumn(name="categoria_id", referencedColumnName="id")},
	*      inverseJoinColumns={@ORM\JoinColumn(name="produto_id", referencedColumnName="id")}
	*      )
	**/
	private $produtos;


	//vai inicializar a collection de produtos
	public function __construct()
	{
		$this->produtos = new ArrayCollection();
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
	public function getProdutos()
	{
	    return $this->produtos;
	}

	public function addProduto($produto)
	{
	    $this->produtos[] = $produto;
	}

}
