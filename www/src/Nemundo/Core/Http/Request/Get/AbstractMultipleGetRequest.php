<?php

namespace Nemundo\Core\Http\Request\Get;


use Nemundo\Core\Http\Request\AbstractRequest;

abstract class AbstractMultipleGetRequest extends AbstractRequest
{


    // getValueList
    // getValue
    public function getMulipleValue()
    {

        //$list = $this->valueList;
        $list=[];
        if (isset($_GET[$this->requestName])) {
            foreach ($_GET[$this->requestName] as $value) {
                $list[] = trim($value);
            }
        }

        return $list;

    }


}