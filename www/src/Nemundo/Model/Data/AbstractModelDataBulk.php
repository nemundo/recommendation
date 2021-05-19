<?php

namespace Nemundo\Model\Data;


use Nemundo\Db\Data\AbstractDataBulk;

// AbstractModelBulkData
class AbstractModelDataBulk extends AbstractDataBulk
{

    use ModelDataTrait;

    public function __construct()
    {
        parent::__construct();
        $this->loadModelData();
    }


    public function save()
    {

        $this->prepeareSave();
        parent::save();

        $this->loadModelData();

    }

}