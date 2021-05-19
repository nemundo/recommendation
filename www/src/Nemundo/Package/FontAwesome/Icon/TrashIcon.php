<?php

namespace Nemundo\Package\FontAwesome\Icon;


use Nemundo\Package\FontAwesome\AbstractFontAwesomeIcon;

class TrashIcon extends AbstractFontAwesomeIcon
{

    public function getContent()
    {
        $this->icon = 'trash';
        return parent::getContent();
    }


}