<?php

namespace Nemundo\Core\Http\Request\Post;


use Nemundo\Core\Http\Request\AbstractRequest;

abstract class AbstractMultiplePostRequest extends AbstractRequest
{


    // getValueList
    // getValue
    // getMulipleValue()
    public function getValueList()
    {

        //$list = $this->valueList;
        $list=[];
        if (isset($_POST[$this->requestName])) {
            foreach ($_POST[$this->requestName] as $value) {
                $list[] = trim($value);
            }
        }

        return $list;

    }

}