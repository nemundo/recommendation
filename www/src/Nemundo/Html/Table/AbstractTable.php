<?php

namespace Nemundo\Html\Table;


use Nemundo\Html\Container\AbstractHtmlContainer;


abstract class AbstractTable extends AbstractHtmlContainer
{

    /**
     * @var string
     */
    public $caption;

    /**
     * @var int
     */
    public $border;

    /**
     * @var int
     */
    public $cellSpacing;

    /**
     * @var int
     */
    public $cellPadding;

    /**
     * @var int
     */
    public $width;


    public function getContent()
    {

        $this->tagName = 'table';

        $this->addAttribute('border', $this->border);
        $this->addAttribute('width', $this->width);
        $this->addAttribute('cellspacing', $this->cellSpacing);
        $this->addAttribute('cellpadding', $this->cellPadding);

        if ($this->caption !== null) {
            $caption = new Caption();  //$this);
            $caption->addContent($this->caption);

            $this->addContainerAtFirst($caption);

        }

        return parent::getContent();

    }

}