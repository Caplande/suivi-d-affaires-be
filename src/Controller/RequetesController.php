<?php
/**
 * Created by PhpStorm.
 * User: Yvon
 * Date: 24/07/2018
 * Time: 05:42
 */

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class RequetesController
 */
class RequetesController extends Controller
{

    public function listerTable($nomTable,$tableSeule)
    {
        return $this->get("app." . strtolower($nomTable) . ".manager")->listerTable($tableSeule);
    }

    /**
     * Extrait la totalité des enrgts des entités: Domaines,Natures,SousDomaines,Statuts
     * @return Response
     * @Route("/listerTablesFixes")
     */
    public function listerTablesFixes()
    {
        $data = [];
        $data["domaines"] = $this->listerTable("Domaines",true);
        $data["natures"] = $this->listerTable("Natures",true);
        $data["sousDomaines"] = $this->listerTable("SousDomaines",true);
        $data["statuts"] = $this->listerTable("Statuts",true);
        $response = new Response(json_encode($data));
        $response->headers->set('Access-Control-Allow-Origin', '*');
        return $response;
    }

    /**
     * Extrait la totalité des enrgts de l'entité: Sujets et des versions associées
     * @return Response
     * @Route("/listerBase")
     */
    public function listerBase(){
        $data=[];
        $data["sujets"] = $this->listerTable("Sujets",true);
        $data["versions"] = $this->listerTable("Sujets",false);
        $data["objets"]= $this->listerObjets();
        $response = new Response(json_encode($data));
        $response->headers->set('Access-Control-Allow-Origin', '*');
        return $response;
     }

    public function listerObjets(){
        return $this->get("app.sujets.manager")->listerObjets();
    }

}
