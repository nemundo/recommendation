<?php

namespace Nemundo\Package\FontAwesome\Icon;


use Nemundo\Package\FontAwesome\AbstractFontAwesomeIcon;

class DeleteIcon extends AbstractFontAwesomeIcon
{

    protected function loadContainer()
    {

        $this->icon = 'trash';
        parent::loadContainer();

    }

}