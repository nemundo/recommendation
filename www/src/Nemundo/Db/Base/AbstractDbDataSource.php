<?php

namespace Nemundo\Db\Base;


use Nemundo\Core\Base\DataSource\AbstractDataSource;

abstract class AbstractDbDataSource extends AbstractDataSource
{

    use ConnectionTrait;

    public function __construct()
    {
        $this->loadConnection();
    }

}