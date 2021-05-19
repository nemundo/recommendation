<?php

namespace Nemundo\Admin\Com\Card;


use Nemundo\Html\Block\Div;
use Nemundo\Html\Container\AbstractContainer;
use Nemundo\Html\Container\AbstractHtmlContainer;
use Nemundo\Html\Formatting\Bold;

class AdminCard extends Div
{

    /**
     * @var string
     */
    public $title;
    // cardTitle

    /**
     * @var Div
     */
    protected $headerDiv;

    /**
     * @var Div
     */
    protected $contentDiv;


    protected function loadContainer()
    {

        $this->addCssClass('card');
        $this->addCssClass('mb-3');

        $this->headerDiv = new Div();
        $this->headerDiv->addCssClass('card-header');
        parent::addContainer($this->headerDiv);

        $this->contentDiv = new Div();
        $this->contentDiv->addCssClass('card-body');
        parent::addContainer($this->contentDiv);

    }


    public function getContent()
    {

        if ($this->title !== null) {
            $bold = new Bold($this->headerDiv);
            $bold->content = $this->title;
        }

        return parent::getContent();

    }


    public function addContainer(AbstractContainer $container)
    {

        $this->contentDiv->addContainer($container);

    }

}