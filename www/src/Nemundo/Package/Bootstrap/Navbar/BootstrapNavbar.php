<?php

namespace Nemundo\Package\Bootstrap\Navbar;


use Nemundo\Com\Html\Listing\UnorderedList;
use Nemundo\Html\Block\Div;
use Nemundo\Html\Container\AbstractContainer;
use Nemundo\Html\Layout\Nav;


class BootstrapNavbar extends Nav
{

    /**
     * @var bool
     */
    public $fixed = false;

    /**
     * @var Div
     */
    protected $containerDiv;


    protected $navbarNavUl;


    protected function loadContainer()
    {

        parent::loadContainer();

        $this->containerDiv = new Div();
        $this->containerDiv->addCssClass('container-fluid');

        $div = new Div($this->containerDiv);
        $div->id = 'navbarNavDropdown';
        $div->addCssClass('collapse navbar-collapse');

        $this->navbarNavUl = new UnorderedList($div);
        $this->navbarNavUl->addCssClass('navbar-nav');


        parent::addContainer($this->containerDiv);

    }

    public function getContent()
    {

        $this->addCssClass('navbar');
        $this->addCssClass('navbar-expand-lg');

        //$this->addCssClass('navbar-dark bg-dark');
        $this->addCssClass('navbar-light bg-light');

        if ($this->fixed) {
            $this->addCssClass('fixed-top');
        }

        return parent::getContent();

    }


    public function addContainer(AbstractContainer $container)
    {

        $this->containerDiv->addContainer($container);

    }

}