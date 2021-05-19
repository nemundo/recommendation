<?php


namespace Nemundo\Project\Reset;


use Nemundo\Core\Base\AbstractBase;

abstract class AbstractReset extends AbstractBase
{

    abstract public function reset();

    abstract public function remove();

}