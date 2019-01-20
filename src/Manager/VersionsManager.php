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
use App\Entity\Versions;

/**
 * Class SujetsManager
 */
class VersionsManager extends BaseManager
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
        return $this->em->getRepository(Versions::class);
    }

    /**
     * Liste la totalité de champs de l'ensemble des enrgts de Sujets
     * @return string
     */


    public function viderEntite()
    {
        $res = $this->getRepository()->s1t();
        return $res;
    }


    public function saveSujet(Versions $sujet)
    {
        return $this->persistAndFlush($sujet);
    }
}
