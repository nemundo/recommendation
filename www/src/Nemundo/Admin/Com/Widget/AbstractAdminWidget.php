<?php

namespace Nemundo\Admin\Com\Widget;


use Nemundo\Com\Container\AbstractRestrictedUserHtmlContainer;
use Nemundo\Com\Html\Hyperlink\SiteHyperlink;
use Nemundo\Html\Block\Div;
use Nemundo\Html\Container\AbstractContainer;
use Nemundo\Html\Container\AbstractHtmlContainer;
use Nemundo\Html\Heading\H5;
use Nemundo\Html\Heading\H6;
use Nemundo\Web\Site\AbstractSite;


abstract class AbstractAdminWidget extends AbstractRestrictedUserHtmlContainer
{

    /**
     * @var string|string[]
     */
    public $widgetTitle;

    /**
     * @var string
     */
    public $widgetId;

    /**
     * @var AbstractSite
     */
    public $widgetSite;

    /**
     * @var H6
     */
    protected $cardTitle;

    /**
     * @var Div
     */
    private $cardBlock;

    /**
     * @var SiteHyperlink
     */
    protected $titleHyperlink;

 //   abstract protected function loadWidget();

 protected function loadWidget() {

 }


    protected function loadContainer()
    {

        parent::loadContainer();

        $this->loadWidget();

        $this->cardTitle = new H5();


        $this->titleHyperlink = new SiteHyperlink();
        $this->cardBlock = new Div();

    }


    public function getContent()
    {

        $this->tagName = 'div';
        //$this->id = 'item_'.$this->widgetId;

        //$this->cardBlock->id = 'item'.$this->widgetId;

        $this->addCssClass('card');
        $this->addCssClass('card-block');
        $this->addCssClass('m-3');

        $this->cardTitle->content = $this->widgetTitle;
        $this->cardTitle->addCssClass('card-header');

        if ($this->widgetSite !== null) {
            $this->titleHyperlink->site = clone($this->widgetSite);
            $this->titleHyperlink->site->title = '';
            $this->titleHyperlink->addCssClass('text-dark');
            $this->titleHyperlink->addContainer($this->cardTitle);
            parent::addContainer($this->titleHyperlink);

        } else {

            parent::addContainer($this->cardTitle);

        }

        $this->cardBlock->addCssClass('card-block');
        $this->cardBlock->addCssClass('p-3');
        parent::addContainer($this->cardBlock);

        return parent::getContent();

    }


    public function addContainer(AbstractContainer $container)
    {
        $this->cardBlock->addContainer($container);
        return $this;
    }

}