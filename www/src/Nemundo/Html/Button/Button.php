<?php

namespace Nemundo\Html\Button;


use Nemundo\Core\Language\Translation;
use Nemundo\Html\Container\AbstractHtmlContainer;



// content element
// AbstractButton
class Button extends AbstractHtmlContainer
{

    /**
     * @var string|string[]
     */
    public $label;

    /**
     * @var bool
     */
    public $disabled = false;



    public function getContent()
    {

        $this->tagName = 'button';
        $this->addContent((new Translation())->getText($this->label));

        if ($this->disabled) {
            $this->addAttributeWithoutValue('disabled');
        }

        return parent::getContent();

    }

}
