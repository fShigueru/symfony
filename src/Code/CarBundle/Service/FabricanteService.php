<?php
/**
 * Created by PhpStorm.
 * User: Akatcham
 * Date: 14/03/2015
 * Time: 11:48
 */

namespace Code\CarBundle\Service;

use Code\CarBundle\Entity\FabricanteInterface;
use Doctrine\ORM\EntityManagerInterface;

/**
 * Class FabricanteService
 * @package Code\CarBundle\Service
 *
 * Definir serviços e regras de negocio do Fabricante
 */

class FabricanteService {

    private $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    public function insert(FabricanteInterface $entity)
    {
        $this->em->persist($entity);
        $this->em->flush();

        return $entity;
    }


    public function update(FabricanteInterface $entity)
    {
        $this->em->persist($entity);
        $this->em->flush();

        return $entity;
    }

    public function delete(FabricanteInterface $entity)
    {
        $this->em->remove($entity);
        $this->em->flush();

        return $entity;
    }
}