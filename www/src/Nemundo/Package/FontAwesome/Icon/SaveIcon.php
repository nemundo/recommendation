<?php

namespace Nemundo\Package\FontAwesome\Icon;


use Nemundo\Package\FontAwesome\AbstractFontAwesomeIcon;

class SaveIcon extends AbstractFontAwesomeIcon
{

    public function getContent()
    {
        $this->icon = 'save';
        return parent::getContent();
    }

}