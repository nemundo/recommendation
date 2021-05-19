<?php

namespace Nemundo\App\Script\Type;


use Nemundo\Core\Base\AbstractBaseClass;


abstract class AbstractScript extends AbstractBaseClass
{

    /**
     * @var string
     */
    public $scriptName;
    // consoleName
    // commandName

    /**
     * @var string
     */
    public $description = '';

    /**
     * @var bool
     */
    public $consoleScript = false;


    abstract function run();


    public function __construct()
    {
        $this->loadScript();
    }

    protected function loadScript()
    {

    }

    protected function addScript(AbstractScript $script)
    {
        $script->run();
        return $this;
    }

}