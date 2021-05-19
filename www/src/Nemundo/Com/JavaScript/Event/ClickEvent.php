<?php

namespace Nemundo\Com\JavaScript\Event;


use Nemundo\Admin\Com\Button\AdminEventButton;
use Nemundo\Html\Container\AbstractContainer;

class ClickEvent extends AbstractJavaScriptEvent
{


    /**
     * ClickEvent constructor.
     * @param AbstractContainer|AdminEventButton|null $parentContainer
     */
    public function __construct(AbstractContainer $parentContainer = null)
    {

        if ($parentContainer->isObjectOfClass(AdminEventButton::class)) {
            $parentContainer->addEvent($this);
        } else {
            parent::__construct($parentContainer);
        }

    }

    public function getContent()
    {

        $this->addPreLine('document.getElementById("' . $this->eventId . '").addEventListener("click", function(event) {');
        $this->addAfterLine('});');

        return parent::getContent();

    }

}