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
use App\Entity\Domaines;
/**
 * Class DomainesManager
 */
class DomainesManager extends BaseManager
{
    protected $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    /**
     * @param $nomTable
     * @return \Doctrine\ORM\EntityRepository
     */
    public function getRepository()
    {
        return $this->em->getRepository(Domaines::class);
    }

    /**
     * Liste la totalité de champs de l'ensemble des enrgts de Domaines
     * @return string
     */
    public function listerTable($tableSeule)
    {
        if($tableSeule) {
            $res = $this->getRepository()->findAll();
            $reponse = [];

            foreach ($res as $enrgt) {
                $temp = [];
                $temp['id'] = $enrgt->getId();
                $temp['domaine'] = $enrgt->getDomaine();
                $temp['importance']=$enrgt->getImportance();
                $reponse[] = $temp;
            }
            return $reponse;
        }
    }
}

