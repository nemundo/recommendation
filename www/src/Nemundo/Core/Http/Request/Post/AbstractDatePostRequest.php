<?php


namespace Nemundo\Core\Http\Request\Post;


use Nemundo\Core\Type\DateTime\Date;

abstract class AbstractDatePostRequest extends AbstractPostRequest
{

    public function getDate()
    {

        $date = null;
        if ($this->hasValue()) {
            $date = (new Date())->fromGermanFormat($this->getValue());
        }
        return $date;

    }

}