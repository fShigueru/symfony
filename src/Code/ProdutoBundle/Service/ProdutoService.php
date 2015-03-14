<?php
/**
 * Created by PhpStorm.
 * User: Akatcham
 * Date: 07/03/2015
 * Time: 14:03
 */

namespace Code\ProdutoBundle\Service;

use Code\ProdutoBundle\Entity\ProdutoInterface;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;

/**
 * Class ProdutoService
 * @package Code\ProdutoBundle\Service
 *
 * Definir regras de negocio do produto service
 *
 */
class ProdutoService
{

    private $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    /**
     * ProdutoInterface é uma instancia de um Produto
     * Insere um novo produto
     * @param ProdutoInterface $entity
     * @return ProdutoInterface $entity
     */
    public function  insert(ProdutoInterface $entity)
    {
        $this->em->persist($entity);
        $this->em->flush();

        return $entity;
    }

    public function update(ProdutoInterface $entity)
    {
        $this->em->persist($entity);
        $this->em->flush();

        return $entity;
    }

    public function delete(ProdutoInterface $entity)
    {
        $this->em->remove($entity);
        $this->em->flush();

        return $entity;
    }

}