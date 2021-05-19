<?php

namespace Nemundo\Geo\Kml\Property;


class Icon extends AbstractProperty
{

    public $href;

    public function getContent()
    {

        $this->tagName = 'Icon';

        if ($this->href !== null) {
            $this->addAttribute('href', $this->href);
        }

        return parent::getContent();

    }

}