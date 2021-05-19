<?php

namespace Nemundo\Geo\Kml\Property;


class HtmlDescription extends Description
{

    public function getContent()
    {

        $this->value = '<![CDATA['.$this->value.']]>';
        return parent::getContent();

    }

}