<?php
/**
 * Created by PhpStorm.
 * User: Yvon
 * Date: 02/11/2018
 * Time: 17:59
 */
namespace App\DonneesTest;

use App\Manager\SujetsManager;
use App\Manager\VersionsManager;
use App\Entity\Sujets;
use App\Entity\Versions;
use App\Repository\DomainesRepository;
use App\Repository\NaturesRepository;
use App\Repository\SousDomainesRepository;
use App\Repository\StatutsRepository;

class SujetsTest
{
    protected $sujetsManager;
    protected $versionsManager;
    protected $domainesRepository;
    protected $naturesRepository;
    protected $sousDomainesRepository;
    protected $statutsRepository;
    protected $outilsDebogage;

    public function __construct(SujetsManager $sujetsManager,
                                VersionsManager $versionsManager,
                                DomainesRepository $domainesRepository,
                                NaturesRepository $naturesRepository,
                                SousDomainesRepository $sousDomainesRepository,
                                StatutsRepository $statutsRepository
    )
    {
        $this->sujetsManager = $sujetsManager;
        $this->versionsManager= $versionsManager;
        $this->domainesRepository = $domainesRepository;
        $this->naturesRepository = $naturesRepository;
        $this->sousDomainesRepository = $sousDomainesRepository;
        $this->statutsRepository = $statutsRepository;
    }


    public function produireDonnees()
    {
        // Ajout 1er enregistrement de sujet à $donneesTestArray
        $sujet = (object)array('domaine' => 3, 'nature' => 2, 'sousDomaine' => 6, 'statut' => 4,
            'objet' => 'objet1', 'inscription' => new \DateTime('9/21/2018'),
            'qui' => 'initiateur1', 'dateVersion' => new \DateTime('9/21/2018'),
            'contenu' => 'contenu1', 'porteur' => 'porteur1', 'delai' => 'Immédiat',
            'avancement' => 'En cours', 'version' => null);
        $this->creerEnrgtsTest("N", $sujet);
        // Ajout 2ème enregistrement de sujet à $donneesTestArray
        $sujet = (object)array('domaine' => 5, 'nature' => 1, 'sousDomaine' => 4, 'statut' => 1,
            'objet' => 'objet2', 'inscription' => new \DateTime('6/4/2018'),
            'qui' => 'initiateur2', 'dateVersion' => new \DateTime('6/4/2018'),
            'contenu' => 'contenu2', 'porteur' => 'porteur2', 'delai' => 'Attendre réponse Mairie',
            'avancement' => 'En cours', 'version' => null);
        $this->creerEnrgtsTest("N", $sujet);
        // Ajout 2ème version au sujet dont l'id=1
        $sujet = (object)array('dateVersion' => new \DateTime('2/8/2018'),
            'contenu' => 'contenu2a', 'porteur' => 'porteur2a', 'delai' => 'Attendre AO',
            'avancement' => 'En cours');
        $this->creerEnrgtsTest("objet2", $sujet);
        // Ajout 3ème version au sujet dont l'id=1
        $sujet = (object)array('dateVersion' => new \DateTime('12/5/2018'),
            'contenu' => 'contenu2b', 'porteur' => 'porteur2b', 'delai' => 'Avant un mois',
            'avancement' => 'En cours');
        $this->creerEnrgtsTest("objet2", $sujet);
    }

    public function creerEnrgtsTest(string $objet, $enrgt)
        // $objet = "N" -> creer sujet
        // $objet = x (x<>"N") ajouter la version au sujet dont l'objet est x.
    {

        // Préparation de l'attribut "version" - Création d'un nouvel enregistrement pour l'entity Versions
        $version = new Versions();
        $version->setDate($enrgt->dateVersion);
        $version->setContenu($enrgt->contenu);
        $version->setPorteur($enrgt->porteur);
        $version->setDelai($enrgt->delai);
        $version->setAvancement($enrgt->avancement);
        if ($objet == "N") { // Nouveau sujet
            // Création du nouvel enregistrement pour l'entity Sujets
            $sujet = new Sujets();
            // Préparation des attributs de type Object de l'enregistrement à créer:
 //           echo "\n","BBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBB","\n";
 //           var_dump($enrgt);
            $domaine = $this->domainesRepository->find($enrgt->domaine);
 //           echo "\n","BBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBB","\n";
            $nature = $this->naturesRepository->find($enrgt->nature);
            $sousDomaine = $this->sousDomainesRepository->find($enrgt->sousDomaine);
            $statut = $this->statutsRepository->find($enrgt->statut);
            $inscription = $enrgt->inscription;
            // Inscription des valeurs dans le nouveau sujet en préparation
            $sujet->setObjet($enrgt->objet);
            $sujet->setInscription($inscription);
            $sujet->setQui($enrgt->qui);
            $sujet->setNature($nature);
            $sujet->setDomaine($domaine);
            $sujet->setSousDomaine($sousDomaine);
            $sujet->setStatut($statut);
        } else {// Sujets existant auquel je rajoute une version
            $sujet = $this->sujetsManager->getRepository()->findByObjet($objet)[0];
//            echo "\n","AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA","\n";
//            var_dump($sujet);
//            echo "\n","AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA","\n";
        }
        // Rattachement de l'instance "version" au sujet dont l'objet = $objet
        $sujet->addVersion($version);
        // Sauvegarde du nouvel enrgt.
        $this->sujetsManager->saveSujet($sujet);
    }

    public function viderEntite()
    {
        $this->sujetsManager->viderEntite();
 //       $this->versionsManager->viderEntite();
    }
}
