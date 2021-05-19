<?php

namespace Nemundo\Html\Listing;


// UnorderdList
class Ul extends AbstractListContainer
{

    public function getContent()
    {
        $this->tagName = 'ul';
        return parent::getContent();
    }

}
