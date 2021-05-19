<?php

namespace Nemundo\Package\Bootstrap\Accordion;


use Nemundo\Html\Block\Div;

use Nemundo\Html\Container\AbstractContainer;
use Nemundo\Html\Container\AbstractHtmlContainer;
use Nemundo\Html\Heading\H5;
use Nemundo\Html\Hyperlink\Hyperlink;


class BootstrapAccordionItem extends Div
{

    public $label;

    /**
     * @var Div
     */
    private $bodyDiv;

    private $link;

    protected function loadContainer()
    {
        parent::loadContainer();

        $this->addCssClass('card');

        $headerDiv = new Div();
        $headerDiv->addCssClass('card-header');
        $headerDiv->addAttribute('role', 'tab');
        $headerDiv->id = 'headingTwo';
        parent::addContainer($headerDiv);


        $h5 = new H5($headerDiv);
        $h5->addCssClass('mb-0');

        $this->link = new Hyperlink($h5);
        //$this->link->content =$this->label;  // 'Item 2';
        $this->link->href = '#collapse1';

        /*
        <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">
        Collapsible Group 1</a>*/


        $div = new Div();
        $div->id = 'collapse1';
        $div->addCssClass('collapse');
        $div->addAttribute('role', 'tabpanel');
        $div->addAttribute('aria-labelledby', 'headingTwo');
        $div->addAttribute('data-bs-parent', '#accordion');
        parent::addContainer($div);

        $this->bodyDiv = new Div($div);
        $this->bodyDiv->addCssClass('card-body');


    }


    public function addContainer(AbstractContainer $container)
    {

        $this->bodyDiv->addContainer($container);

        //parent::addContainer($com);
    }



    public function getContent()
    {

        $this->link->content =$this->label;
        return parent::getContent();

    }

}

