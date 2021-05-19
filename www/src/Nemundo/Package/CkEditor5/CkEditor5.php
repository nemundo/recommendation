<?php

namespace Nemundo\Package\CkEditor5;


use Nemundo\Html\Form\Textarea\Textarea;


class CkEditor5 extends Textarea
{

    use CkEditor5Trait;

    public function getContent()
    {

        if ($this->id == null) {
            $this->id = 'editor';
        }
        $this->loadCkEditor($this->id);

        return parent::getContent();

    }

}