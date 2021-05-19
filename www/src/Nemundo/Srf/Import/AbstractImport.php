<?php


namespace Nemundo\Srf\Import;


use Nemundo\Core\Base\AbstractBase;

abstract class AbstractImport extends AbstractBase
{

    abstract public function importData();

}