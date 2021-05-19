<?php

namespace Nemundo\Html\Form\Input;


class FileInput extends AbstractInput
{

    /**
     * @var bool
     */
    public $multiple = false;

    /**
     * @var AcceptFileType
     */
    public $accept;


    public $capture;

//<input type="file" accept="image/*" capture="camera" />


    public function getContent()
    {

        if ($this->multiple) {
            $this->name = $this->name . '[]';
        }

        $this->addAttribute('type', 'file');
        $this->addAttribute('accept', $this->accept);

        if ($this->multiple) {
            $this->addAttributeWithoutValue('multiple');
        }

        return parent::getContent();

    }

}
