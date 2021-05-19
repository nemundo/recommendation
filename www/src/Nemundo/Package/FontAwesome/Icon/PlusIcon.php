<?php

namespace Nemundo\Package\FontAwesome\Icon;


use Nemundo\Package\FontAwesome\AbstractFontAwesomeIcon;

class PlusIcon extends AbstractFontAwesomeIcon
{

    public function getContent()
    {
        $this->icon = 'plus';
        return parent::getContent();
    }


}