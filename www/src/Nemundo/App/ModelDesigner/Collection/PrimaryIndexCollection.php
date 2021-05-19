<?php

namespace Nemundo\App\ModelDesigner\Collection;


use Nemundo\Core\Base\AbstractBase;
use Nemundo\Db\Index\AbstractPrimaryIndex;
use Nemundo\Db\Index\AutoIncrementIdPrimaryIndex;
use Nemundo\Db\Index\NumberIdPrimaryIndex;
use Nemundo\Db\Index\TextIdPrimaryIndex;
use Nemundo\Db\Index\UniqueIdPrimaryIndex;

class PrimaryIndexCollection extends AbstractBase
{

    /**
     * @var AbstractPrimaryIndex[]
     */
    private $primaryIndexList = [];

    public function __construct()
    {

        $this->primaryIndexList[] = new AutoIncrementIdPrimaryIndex();
        $this->primaryIndexList[] = new NumberIdPrimaryIndex();
        $this->primaryIndexList[] = new TextIdPrimaryIndex();
        $this->primaryIndexList[] = new UniqueIdPrimaryIndex();

    }


    public function getPrimaryIndexCollection()
    {

        return $this->primaryIndexList;

    }


}