<?php

namespace Nemundo\Package\FontAwesome\Icon;


use Nemundo\Package\FontAwesome\AbstractFontAwesomeIcon;

class UpIcon extends AbstractFontAwesomeIcon
{

    public function getContent()
    {
        $this->icon = 'arrow-up';
        return parent::getContent();
    }

}

