<?php

namespace Nemundo\Package\Bootstrap\Tabs\Panel;


use Nemundo\Html\Container\AbstractHtmlContainer;
use Nemundo\Core\Text\TextConverter;

class BootstrapTabsPanelContainer extends AbstractHtmlContainer
{

    /**
     * @var string
     */
    public $panelTitle;

    /**
     * @var string
     */
    public $panelUrl;

    /**
     * @var bool
     */
    public $active = false;

    public function getPanelId()
    {

        $panelId = (new TextConverter())->convertToCode($this->panelTitle, true);
        return $panelId;

    }

}