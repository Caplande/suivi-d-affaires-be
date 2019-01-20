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
use App\Manager\SujetsManager;

class ListerSujetsCommand extends Command
{
    protected $sujetsManager;

    public function __construct(SujetsManager $sujetsManager)
    {
         parent::__construct();
        $this->sujetsManager=$sujetsManager;
    }

    protected function configure()
    {
        $this
            // the name of the command (the part after "bin/console")
            ->setName('app:lister-sujets')
            // the short description shown while running "php bin/console list"
            ->setDescription('Liste la totalité des sujets avec leurs différentes versions')
            // the full command description shown when running the command with
            // the "--help" option
            ->setHelp('Liste la totalité des sujets avec leurs différentes versions');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $res=$this->sujetsManager->listerSujets();
        $output->writeln(json_encode($res));
        $output->writeln("SSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSS");
        $res=$this->sujetsManager->listerVersions(2);
        $output->writeln($res);
    }
}