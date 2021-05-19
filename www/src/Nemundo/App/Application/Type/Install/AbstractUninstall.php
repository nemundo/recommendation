<?php

namespace Nemundo\App\Application\Type\Install;


use Nemundo\Core\Base\AbstractBase;


abstract class AbstractUninstall extends AbstractBase
{

    abstract public function uninstall();

}