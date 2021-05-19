<?php

namespace Nemundo\Package\FontAwesome\Icon;


use Nemundo\Package\FontAwesome\AbstractFontAwesomeIcon;

class ActiveIcon extends AbstractFontAwesomeIcon
{
    protected function loadContainer()
    {
        $this->icon = 'eye';
    }

}