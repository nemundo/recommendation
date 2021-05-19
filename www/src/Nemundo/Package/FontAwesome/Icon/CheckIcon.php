<?php

namespace Nemundo\Package\FontAwesome\Icon;

use Nemundo\Package\FontAwesome\AbstractFontAwesomeIcon;

class CheckIcon extends AbstractFontAwesomeIcon
{

    public function getContent()
    {
        $this->icon = 'check';
        return parent::getContent();
    }


}