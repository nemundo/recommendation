<?php

namespace Nemundo\Package\Bootstrap\Layout;


use Nemundo\Html\Block\Div;
use Nemundo\Html\Container\AbstractContainer;
use Nemundo\Html\Container\AbstractHtmlContainer;


class BootstrapCenterLayout extends AbstractHtmlContainer
{

    /**
     * @var Div
     */
    private $colDiv;


    protected function loadContainer()
    {

        $this->colDiv = new Div();
        $this->colDiv->addCssClass('col-4 align-self-center');

        parent::addContainer($this->colDiv);

    }


    public function addContainer(AbstractContainer $container)
    {
        return $this->colDiv->addContainer($container);
    }


}