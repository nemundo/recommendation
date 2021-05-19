<?php


namespace Nemundo\App\Application\Setup;


use Nemundo\App\Application\Type\AbstractApplication;
use Nemundo\Core\Base\AbstractBase;

abstract class AbstractSetup extends AbstractBase
{

    /**
     * @var AbstractApplication
     */
    public $application;


    public function __construct(AbstractApplication $application = null)
    {
        $this->application = $application;
    }

}