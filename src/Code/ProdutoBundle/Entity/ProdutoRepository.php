<?php
namespace Code\ProdutoBundle\Entity;

use Doctrine\ORM\EntityRepository;

class ProdutoRepository extends EntityRepository
{


	public function getProdutoIdMaiorQue($num)
	{
		/*
		* Consulta com DQL
		*/
		// $dql = "SELECT p From CodeProdutoBundle:Produto p WHERE p.id > :num ";

		// return $this
		// 	->getEntityManager()
		// 	->createQuery($dql)
		// 	->setParameter(":num",$num)
		// 	->getResult()
		// ;

		/*
		* Consulta com QueryBuilder
		*/
		return $this
			->createQueryBuilder("p")
			->where("p.id > :num")
			->setParameter(":num",$num)
			->getQuery()
			->getResult()
		;
	}

}