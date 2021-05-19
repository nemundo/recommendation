<?php

namespace Nemundo\Package\FontAwesome\Hyperlink;



use Nemundo\Com\Html\Hyperlink\UrlHyperlink;

use Nemundo\Package\FontAwesome\FontAwesomeIcon;


class IconUrlHyperlink extends UrlHyperlink
{

    /**
     * @var FontAwesomeIcon
     */
    public $icon;



    protected function loadContainer()
    {

        parent::loadContainer();
        //$this->showSiteTitle = false;

        $this->icon = new FontAwesomeIcon();

    }


    public function getContent()
    {

        $this->addContainer($this->icon);

        return parent::getContent();
    }

}