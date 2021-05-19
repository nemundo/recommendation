<?php

namespace Nemundo\Package\Bootstrap\Tabs\Panel;


use Nemundo\Com\Html\Hyperlink\UrlHyperlink;
use Nemundo\Com\Html\Listing\UnorderedList;
use Nemundo\Html\Block\Div;
use Nemundo\Html\Container\AbstractContainer;
use Nemundo\Html\Container\AbstractHtmlContainer;
use Nemundo\Html\Listing\Li;

class BootstrapTabsPanel extends AbstractHtmlContainer
{

    /**
     * @var BootstrapTabsPanelContainer[]
     */
    private $panelList = [];


    public function addPanel(BootstrapTabsPanelContainer $panel)
    {
        $this->panelList[] = $panel;
    }

    public function addContainer(AbstractContainer $panel)
    {

        $this->panelList[] = $panel;

    }


    public function getContent()
    {

        $menu = new UnorderedList();
        $menu->addCssClass('nav nav-tabs');
        $menu->addAttribute('role', 'tablist');

        foreach ($this->panelList as $panel) {

            $li = new Li($menu);
            $li->addCssClass('nav-item');
            $li->addAttribute('role', 'presentation');

            $link = new UrlHyperlink($li);
            $link->addCssClass('nav-link');
            if ($panel->active) {
                $link->addCssClass('active');
            }
            $link->addAttribute('data-bs-toggle', 'tab');
            $link->addAttribute('role', 'tab');
            $link->content = $panel->panelTitle;
            $link->url = '#' . $panel->getPanelId();

            if ($panel->panelUrl !== null) {
                $link->url = $panel->panelUrl;
            }

        }
        parent::addContainer($menu);

        $div = new Div();
        $div->addCssClass('tab-content');
        foreach ($this->panelList as $panel) {

            $divPanel = new Div();
            $divPanel->id = $panel->getPanelId();
            $divPanel->addCssClass('tab-pane');
            if ($panel->active) {
                $divPanel->addCssClass('active');
            }
            $divPanel->addAttribute('role', 'tabpanel');
            $divPanel->addContainer($panel);

            $div->addContainer($divPanel);

        }

        parent::addContainer($div);

        return parent::getContent();

    }

}