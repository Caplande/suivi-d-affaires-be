<?php
/**
 * Created by PhpStorm.
 * User: Yvon
 * Date: 08/09/2018
 * Time: 06:24
 */
namespace App\Manager;

use Doctrine\ORM\EntityManagerInterface;
use App\Manager\BaseManager;
use App\Entity\Natures;
/**
 * Class NaturesManager
 */
class NaturesManager extends BaseManager
{
    protected $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    /**
     * @return \Doctrine\ORM\EntityRepository
     */
    public function getRepository()
    {
        return $this->em->getRepository(Natures::class);
    }

    /**
     * Liste la totalité de champs de l'ensemble des enrgts de Natures
     * @return string
     */
    public function listerTable($tableSeule)
    {
        if ($tableSeule) {
            $res = $this->getRepository()->findAll();
            $reponse = [];

            foreach ($res as $enrgt) {
                $temp = [];
                $temp['id'] = $enrgt->getId();
                $temp['nature'] = $enrgt->getNature();
                $temp['priorite']=$enrgt->getPriorite();
                $reponse[] = $temp;
            }
            return $reponse;
        }
    }
}

