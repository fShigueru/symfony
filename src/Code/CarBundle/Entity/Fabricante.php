<?php
namespace  Code\CarBundle\Entity;

use Doctrine\ORM\Mapping as ORM;


/**
 * @ORM\Table();
 * @ORM\Entity(repositoryClass="Code\CarBundle\Entity\FabricanteRepository");
 */
class Fabricante
{

	/**
	 *@var integer
	 *
	 *@ORM\Column(name="id", type="integer")
	 *@ORM\Id
	 *@ORM\GeneratedValue(strategy="AUTO")
	 */
	 private $id;


	/**
	 *@var string
	 *
	 * @ORM\Column(name="nome", type="string" ,length=255)
	 */
	private $nome;

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
}