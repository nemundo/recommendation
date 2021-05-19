<?php

namespace Nemundo\Package\FontAwesome\Icon;


use Nemundo\Package\FontAwesome\AbstractFontAwesomeIcon;

class ViewIcon extends AbstractFontAwesomeIcon
{

    public function getContent()
    {
        $this->icon = 'info';
        return parent::getContent();
    }


}