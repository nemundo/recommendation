<?php

namespace Nemundo\Com\TableBuilder;

use Nemundo\Com\Html\Hyperlink\SiteHyperlink;
use Nemundo\Com\Html\Hyperlink\UrlHyperlink;
use Nemundo\Html\Container\AbstractContainer;
use Nemundo\Html\Formatting\Bold;
use Nemundo\Html\Table\Td;
use Nemundo\Html\Table\Tr;
use Nemundo\Package\FontAwesome\AbstractFontAwesomeIcon;
use Nemundo\Package\FontAwesome\Icon\CheckIcon;
use Nemundo\Web\Site\AbstractSite;


class TableRow extends Tr
{

    /**
     * @var bool
     */
    public $strikeThrough = false;


    public function addText($text, $nowrap = false)
    {

        $td = new Td($this);
        $td->content = $text;
        $td->nowrap = $nowrap;

        return $this;
    }

    public function addTextRight($text, $nowrap = false)
    {

        $td = new Td($this);
        $td->content = $text;
        $td->nowrap = $nowrap;
        $td->addCssClass('text-right');

        return $this;
    }


    public function addBoldText($text)
    {

        $bold = new Bold($this);
        $bold->content = $text;
        return $this;
    }

    public function addBoldTextRight($text)
    {

        $td = new Td($this);
        //$td->content = $text;
        //$td->nowrap = $nowrap;
        $td->addCssClass('text-right');


        $bold = new Bold($td);
        $bold->content = $text;
        return $this;
    }


    public function addEmpty()
    {
        $this->addText('&nbsp;');
        return $this;
    }


    public function addSite(AbstractSite $site)
    {

        $hyperlink = new SiteHyperlink($this);
        $hyperlink->site = $site;
        return $this;

    }


    public function addHyperlink($url, $label = null, $openNewWindow = false)
    {

        if ($label == null) {
            $label = $url;
        }

        $hyperlink = new UrlHyperlink($this);
        $hyperlink->content = $label;
        $hyperlink->url = $url;
        $hyperlink->openNewWindow = $openNewWindow;

        return $this;

    }


    // umgekehrte Parameter Reiehnfolge
    public function addHyperlinkIcon(AbstractFontAwesomeIcon $icon, AbstractSite $site)
    {

        $hyperlink = new SiteHyperlink($this);
        $hyperlink->showSiteTitle = false;
        $hyperlink->addContainer($icon);
        $hyperlink->title = $site->title;
        $hyperlink->site = $site;

    }


    //public function addIconSite(AbstractIconSite $site)
    // public function addIconSite($site)
    public function addIconSite(AbstractSite $site)
    {

        // wegen dem
        //  new DeleteActionSite()

        $hyperlink = new SiteHyperlink($this);
        $hyperlink->addContainer($site->icon);
        $hyperlink->showSiteTitle = false;
        $hyperlink->title = $site->title;
        $hyperlink->site = $site;

    }


    public function addYesNo($value)
    {

        if ($value) {
            new CheckIcon($this);
        } else {
            $this->addEmpty();
        }

        return $this;
    }


    public function addContainer(AbstractContainer $container)
    {

        if ($container->isObjectOfClass(Td::class)) {
            parent::addContainer($container);
        } else {
            $td = new Td();
            $td->addContainer($container);
            parent::addContainer($td);
        }

    }


    public function getContent()
    {

        if ($this->strikeThrough) {
            $this->addAttribute('style', 'text-decoration: line-through');
        }

        return parent::getContent();

    }

}
