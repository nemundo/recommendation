<?php

namespace Nemundo\Html\Listing;


class OrderedList extends AbstractListContainer
{

    public function getContent()
    {
        $this->tagName = 'ol';
        return parent::getContent();
    }

}
