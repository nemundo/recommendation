<?php

namespace Nemundo\Package\Bootstrap\Navbar;


use Nemundo\Com\Html\Hyperlink\SiteHyperlink;
use Nemundo\Html\Container\AbstractHtmlContainer;
use Nemundo\Html\Image\Img;
use Nemundo\Web\Site\AbstractSite;

class BootstrapNavbarLogo extends AbstractHtmlContainer
{

    /**
     * @var AbstractSite
     */
    public $logoSite;

    /**
     * @var string
     */
    public $logoUrl;

    public function getContent()
    {

        $hyperlink = new SiteHyperlink($this);
        $hyperlink->addCssClass('navbar-brand');
        $hyperlink->site = $this->logoSite;
        if ($this->logoUrl !== null) {
            $hyperlink->showSiteTitle = false;
            $img = new Img($hyperlink);
            $img->src = $this->logoUrl;
            $img->width = 200;
        }

        return parent::getContent();

    }

}