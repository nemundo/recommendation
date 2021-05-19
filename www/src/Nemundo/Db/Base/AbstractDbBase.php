<?php

namespace Nemundo\Db\Base;

use Nemundo\Core\Base\AbstractBase;


abstract class AbstractDbBase extends AbstractBase
{

    use ConnectionTrait;

    public function __construct()
    {
        $this->loadConnection();
    }

}