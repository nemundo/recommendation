<?php

namespace Nemundo\Package\FontAwesome\Icon;


use Nemundo\Package\FontAwesome\AbstractFontAwesomeIcon;

class InactiveIcon extends AbstractFontAwesomeIcon
{

    protected function loadContainer()
    {
        $this->icon = 'eye-slash';
    }
}