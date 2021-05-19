<?php


namespace Nemundo\Package\FontAwesome\Site;


use Nemundo\Package\FontAwesome\FontAwesomeIcon;

trait IconSiteTrait
{

    /**
     * @var FontAwesomeIcon
     */
    public $icon;


    protected function loadIcon()
    {

        $this->icon = new FontAwesomeIcon();
        $this->menuActive = false;

    }

}