<?php

namespace Nemundo\Package\Bootstrap\Tabs;


use Nemundo\Com\Html\Hyperlink\UrlHyperlink;

use Nemundo\Html\Listing\Li;
use Nemundo\Web\Site\AbstractSite;

class BootstrapTabsItem extends Li  // AbstractHtmlContainerList
{

    /**
     * @var AbstractSite
     */
    public $site;

    /**
     * @var bool
     */
    public $active = false;

    /**
     * @var bool
     */
    public $disabled = false;


    public function getContent()
    {

        $this->addCssClass('nav-item');

        $hyperlink = new UrlHyperlink($this);
        $hyperlink->addCssClass('nav-link');
        $hyperlink->content = $this->site->title;
        $hyperlink->url = $this->site->getUrl();

        if ($this->active) {
            $hyperlink->addCssClass('active');
        }

        if ($this->disabled) {
            $hyperlink->addCssClass('disabled');
        }

        return parent::getContent();

    }

}