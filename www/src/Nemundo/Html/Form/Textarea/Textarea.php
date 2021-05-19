<?php

namespace Nemundo\Html\Form\Textarea;


use Nemundo\Html\Form\AbstractFormItem;

class Textarea extends AbstractFormItem
{

    /**
     * @var bool
     */
    public $readOnly = false;

    /**
     * @var bool
     */
    public $autofocus = false;

    /**
     * @var bool
     */
    public $autocomplete = false;

    /**
     * @var int
     */
    public $rows;

    /**
     * @var int
     */
    public $cols;

    /**
     * @var string
     */
    public $placeholder;


    public function getContent()
    {

        $this->tagName = 'textarea';
        $this->returnOneLine = true;

        $this->addAttribute('rows', $this->rows);
        $this->addAttribute('cols', $this->cols);
        $this->addAttribute('placeholder', $this->placeholder);

        if ($this->readOnly) {
            $this->addAttributeWithoutValue('readonly');
        }

        if (!$this->autocomplete) {
            $this->addAttribute('autocomplete', 'off');
        }

        if ($this->autofocus) {
            $this->addAttributeWithoutValue('autofocus');
        }

        $this->addContent($this->value);

        return parent::getContent();

    }

}
