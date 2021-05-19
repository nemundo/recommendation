<?php


namespace Nemundo\App\Linux\Service;


use Nemundo\App\Linux\Ssh\AbstractSshCommand;


abstract class AbstractService extends AbstractSshCommand
{

    protected $serviceName;

    abstract protected function loadService();

    public function __construct()
    {
        parent::__construct();
        $this->loadService();
    }


    public function start()
    {
        $this->runCommand('sudo service ' . $this->serviceName . ' start');
    }


    public function stop()
    {
        $this->runCommand('sudo service ' . $this->serviceName . ' stop');
    }


    public function restart()
    {
        $this->runCommand('sudo service ' . $this->serviceName . ' restart');
    }


}