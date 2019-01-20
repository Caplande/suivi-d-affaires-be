<?php
/**
 * Created by PhpStorm.
 * User: Yvon
 * Date: 30/10/2018
 * Time: 13:21
 */

namespace App\Commands;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use App\DonneesTest\SujetsTest;

class CreerDataFacticesCommand extends Command{
    private $sujetsTest;
    public function __construct(SujetsTest $sujetsTest){
        $this->sujetsTest=$sujetsTest;
        parent::__construct();
    }
    protected function configure(){
        $this
            // the name of the command (the part after "bin/console")
            ->setName('app:creer-data-factices')

            // the short description shown while running "php bin/console list"
            ->setDescription('Crée des données factices')

            // the full command description shown when running the command with
            // the "--help" option
            ->setHelp('Cette commande crée des données factices dans la table "Sujets" après l\'avoir remise � z�ro)');
    }

    protected function execute(InputInterface $input, OutputInterface $output){
        $resVidage = $this->sujetsTest->viderEntite();
        $resInsertion=$this->sujetsTest->produireDonnees();
        //$output->writeln(json_encode($liste));
    }
}