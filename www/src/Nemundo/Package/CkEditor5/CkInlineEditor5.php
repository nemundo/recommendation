<?php

namespace Nemundo\Package\CkEditor5;



use Nemundo\Html\Form\Textarea\Textarea;


class CkInlineEditor5 extends Textarea
{

    use CkEditor5Trait;

    public function getContent()
    {

        if ($this->id == null) {
            $this->id = 'editor';
        }
        $this->loadInlineEditor($this->id);

        return parent::getContent();

    }

}