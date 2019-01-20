<?php
/**
 * Created by PhpStorm.
 * User: Yvon
 * Date: 08/09/2018
 * Time: 06:14
 */
namespace App\Manager;

abstract class BaseManager{
    protected function persistAndFlush($entity){
        try{
            $this->em->persist($entity);
            $this->em->flush();
            return 101;
        } catch (Exception $e){
            return 100;
        }
    }
}