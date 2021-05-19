<?php

namespace Nemundo\Package\FontAwesome\Icon;


use Nemundo\Package\FontAwesome\AbstractFontAwesomeIcon;

class DownIcon extends AbstractFontAwesomeIcon
{

    public function getContent()
    {
        $this->icon = 'arrow-down';
        return parent::getContent();
    }

}
