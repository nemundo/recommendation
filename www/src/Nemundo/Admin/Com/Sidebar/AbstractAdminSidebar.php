<?php

namespace Nemundo\Admin\Com\Sidebar;


use Nemundo\Admin\Com\Title\AdminSubtitle;
use Nemundo\Com\Html\Hyperlink\SiteHyperlink;
use Nemundo\Core\Type\Number\Number;
use Nemundo\Html\Block\Div;
use Nemundo\Html\Container\AbstractHtmlContainer;
use Nemundo\Html\Inline\Span;


abstract class AbstractAdminSidebar extends AbstractHtmlContainer
{

    /**
     * @var string[]
     */
    protected $sidebarTitle;

    /**
     * @var AdminSubtitle
     */
    private $adminSubtitle;

    /**
     * @var Div
     */
    private $div;

    protected function loadContainer()
    {

        parent::loadContainer();

        $this->adminSubtitle = new AdminSubtitle($this);

        $this->div = new Div($this);
        $this->div->addCssClass('list-group');

    }


    public function addSite($site, $count)
    {

        $badge = new Span();
        $badge->addCssClass('badge badge-primary badge-pill');
        $badge->content = (new Number($count))->formatNumber();

        $hyperlink = new SiteHyperlink($this->div);
        $hyperlink->addCssClass('list-group-item d-flex justify-content-between align-items-center list-group-item-action');
        $hyperlink->site = $site;
        $hyperlink->site->title .= ' ' . $badge->getContent();

    }


    public function getContent()
    {

        $this->adminSubtitle->content = $this->sidebarTitle;

        return parent::getContent();

    }

}