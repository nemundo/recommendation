<?php

namespace Nemundo\Html\Table;


class Td extends AbstractTd
{

    public function getContent()
    {

        $this->tagName = 'td';
        return parent::getContent();

    }

}