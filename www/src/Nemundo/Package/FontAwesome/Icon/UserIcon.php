<?php

namespace Nemundo\Package\FontAwesome\Icon;


use Nemundo\Package\FontAwesome\AbstractFontAwesomeIcon;

class UserIcon extends AbstractFontAwesomeIcon
{

    public function getContent()
    {
        $this->icon = 'user';
        return parent::getContent();
    }


}