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
use App\Entity\Sujets;


/**
 * Class SujetsManager
 */
class SujetsManager extends BaseManager
{
    protected $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    /**
     * Liste la totalité de champs de l'ensemble des enrgts de Sujets
     * @return string
     */
    public function listerTable($tableSeule)
    {
        $res = $this->getRepository()->findAll();
//        var_dump($res);
         $reponse = array();
        foreach ($res as $enrgt) {
            $temp = array();
            $temp['id'] = $enrgt->getId();
            $temp['objet'] = $enrgt->getObjet();
            $temp['inscription'] = $enrgt->getInscription();
            $temp['qui'] = $enrgt->getQui();
            $temp['nature'] = $enrgt->getNature()->getId();
            $temp['domaine'] = $enrgt->getDomaine()->getId();
            $temp['sousDomaine'] = $enrgt->getSousDomaine()->getId();
            $temp['statut'] = $enrgt->getStatut()->getId();
            if(!$tableSeule) {
                $versions = $enrgt->getVersions();
                foreach ($versions as $version) {
                    $temp['dateVersion'] = $version->getDate();
                    $temp['contenuVersion'] = $version->getContenu();
                    $temp['porteurVersion'] = $version->getPorteur();
                    $temp['delaiVersion'] = $version->getDelai();
                    $temp['avancementVersion'] = $version->getAvancement();
                    $temp['rangVersion'] = $version->getRang();
                    $reponse[] = $temp;
                  }
            } else{
                $reponse[] = $temp;
            }
        }
         return $reponse;
    }

    /**
     * @param $nomTable
     * @return \Doctrine\ORM\EntityRepository
     */
    public function getRepository()
    {
        return $this->em->getRepository(Sujets::class);
    }

    public function listerObjets()
    {
        $objets = $this->getRepository()->l1psu();
          $res = array();
        foreach ($objets as $objet) {
            $res[]=$objet;
        }
         return $res;
    }

    public function listerVersions($sujet)
    {
        if (gettype($sujet) == "integer") {
            $sujet = $this->getRepository()->find($sujet);
        } elseif (get_class($sujet) != "Sujets") {
            echo 'Le paramètre $sujet de la méthode \listeVersions\' n\'est pas valide!';
        }
        $res = array();
        $versionsTriees = $sujet->getVersions();
        foreach ($versionsTriees as $version) {
            $res[] = "S" . $sujet->getId() . " - V" . $version->getDate()->format('y\-m\-d');
        }
        arsort($res);
        return $res;
    }

    public function viderEntite()
    {
        $res = $this->getRepository()->s1t();
        return $res;
    }


    public function saveSujet(Sujets $sujet)
    {
        return $this->persistAndFlush($sujet);
    }
}
