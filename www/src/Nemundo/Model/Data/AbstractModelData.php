<?php

namespace Nemundo\Model\Data;

use Nemundo\Db\Data\AbstractData;


class AbstractModelData extends AbstractData
{

    use ModelDataTrait;


    public function __construct()
    {

        parent::__construct();
        $this->loadModelData();

    }


    public function save()
    {

        $id = $this->prepeareSave();
        $saveId = parent::save();

        if ($id == null) {
            $id = $saveId;
        }

        return $id;

    }

}