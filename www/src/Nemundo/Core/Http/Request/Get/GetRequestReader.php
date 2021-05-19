<?php

namespace Nemundo\Core\Http\Request\Get;


use Nemundo\Core\Base\DataSource\AbstractDataSource;
use Nemundo\Core\Http\Request\RequestItem;

class GetRequestReader extends AbstractDataSource
{

    protected function loadData()
    {

        foreach ($_GET as $key => $value) {

            $item = new RequestItem();
            $item->name = $key;
            $item->value = $value;
            $this->addItem($item);

        }

    }


    /**
     * @return RequestItem[]
     */
    public function getData()
    {
        return parent::getData();
    }

}