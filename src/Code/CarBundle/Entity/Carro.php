<?php
namespace Code\CarBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table();
 * @ORM\Entity();
 */
class Carro
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
	 * @ORM\Column(name="modelo", type="string" ,length=255)
	 */
	private $modelo;

	/**
	 *@var integer
	 *
	 * @ORM\Column(name="ano", type="integer" ,length=4)
	 */
	private $ano;

	/**
	 *@var string
	 *
	 * @ORM\Column(name="cor", type="string" ,length=20)
	 */
	private $cor;
	/**
	 * @ORM\ManyToOne(targetEntity="Code\CarBundle\Entity\Fabricante", inversedBy="carros")
	 * @ORM\JoinColumn(name="fabricante_id", referencedColumnName="id")
	 */
	private $fabricante;

	public function getId()
	{
	    return $this->id;
	}

	public function setId($id)
	{
	    $this->id = $id;
	}

	public function getModelo()
	{
	    return $this->modelo;
	}

	public function setModelo($modelo)
	{
	     $this->modelo = $modelo;
	}

	public function getAno()
	{
	    return $this->ano;
	}

	public function setAno($ano)
	{
	    return $this->ano = $ano;
	}

	public function getCor()
	{
	    return $this->cor;
	}

	public function setCor($cor)
	{
	    $this->cor = $cor;
	}

	public function getFabricante()
	{
	    return $this->fabricante;
	}

	public function setFabricante($fabricante)
	{
	    $this->fabricante = $fabricante;
	}
}