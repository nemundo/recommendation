<?php

namespace Nemundo\Package\Bootstrap\Tabs;


use Nemundo\Com\Html\Hyperlink\SiteHyperlink;
use Nemundo\Com\Html\Hyperlink\UrlHyperlink;
use Nemundo\Html\Block\Div;

use Nemundo\Html\Listing\AbstractLi;

use Nemundo\Html\Listing\Ul;
use Nemundo\Web\Site\AbstractSite;

class BootstrapSiteTabsDropdown extends AbstractLi
{

    /**
     * @var AbstractSite
     */
    public $site;


    public function getContent()
    {

/*
        <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Dropdown</a>
    <ul class="dropdown-menu">
      <li><a class="dropdown-item" href="#">Action</a></li>
      <li><a class="dropdown-item" href="#">Another action</a></li>
      <li><a class="dropdown-item" href="#">Something else here</a></li>
      <li><hr class="dropdown-divider"></li>
      <li><a class="dropdown-item" href="#">Separated link</a></li>
    </ul>
  </li>*/


        $this->addCssClass('nav-item dropdown');

        $this->addCssClass('active');

        $hyperlink = new UrlHyperlink($this);   // new SiteHyperlink($this);
        //$hyperlink->site = $this->site;
        $hyperlink->content= $this->site->title;  // 'config';
        $hyperlink->addCssClass('nav-link dropdown-toggle');
        $hyperlink->addAttribute('data-bs-toggle', 'dropdown');
        $hyperlink->addAttribute('role', 'button');
        $hyperlink->addAttribute('aria-haspopup', 'true');
        $hyperlink->addAttribute('aria-expanded', 'false');
        //$hyperlink->content = $this->site->title;

        $div = new Ul($this);
        $div->addCssClass('dropdown-menu');

        foreach ($this->site->getMenuActiveSite() as $subsite) {

            $hyperlink = new SiteHyperlink($div);  // new Hyperlink($div);
            $hyperlink->addCssClass('dropdown-item');
            $hyperlink->site = $subsite;
            //$hyperlink->content = $subsite->title;
            //$hyperlink->url = $subsite->getUrl();

        }

        return parent::getContent();

    }

}