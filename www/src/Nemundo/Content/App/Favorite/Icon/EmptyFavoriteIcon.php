<?php


namespace Nemundo\Content\App\Favorite\Icon;


use Nemundo\Package\FontAwesome\AbstractFontAwesomeIcon;

class EmptyFavoriteIcon extends AbstractFontAwesomeIcon
{

    protected function loadContainer()
    {
        $this->icon = 'star';
        $this->solid = true;
    }

}