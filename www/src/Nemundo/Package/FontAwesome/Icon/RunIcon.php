<?php

namespace Nemundo\Package\FontAwesome\Icon;


use Nemundo\Package\FontAwesome\AbstractFontAwesomeIcon;

class RunIcon extends AbstractFontAwesomeIcon
{

    public function getContent()
    {
        $this->icon = 'play';
        return parent::getContent();
    }

}