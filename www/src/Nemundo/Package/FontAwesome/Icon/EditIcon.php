<?php

namespace Nemundo\Package\FontAwesome\Icon;


use Nemundo\Package\FontAwesome\AbstractFontAwesomeIcon;

class EditIcon extends AbstractFontAwesomeIcon
{

    public function getContent()
    {
        $this->icon = 'edit';
        return parent::getContent();
    }


}