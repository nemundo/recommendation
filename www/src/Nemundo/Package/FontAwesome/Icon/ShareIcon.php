<?php

namespace Nemundo\Package\FontAwesome\Icon;


use Nemundo\Package\FontAwesome\AbstractFontAwesomeIcon;

class ShareIcon extends AbstractFontAwesomeIcon
{

    public function getContent()
    {
        $this->icon = 'share';
        return parent::getContent();
    }

}