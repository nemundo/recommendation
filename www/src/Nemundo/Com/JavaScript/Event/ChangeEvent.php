<?php

namespace Nemundo\Com\JavaScript\Event;


class ChangeEvent extends AbstractJavaScriptEvent
{


    public function getContent()
    {


        $this->addPreLine('document.getElementById("' . $this->eventId . '").addEventListener("change", function(event) {');


        $this->addAfterLine('});');

        return parent::getContent();

    }



}