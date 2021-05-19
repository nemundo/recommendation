<?php

namespace Nemundo\Package\Bootstrap\FormElement;


use Nemundo\Com\FormBuilder\Item\AbstractRadioGroup;
use Nemundo\Core\Random\RandomText;
use Nemundo\Html\Block\Div;
use Nemundo\Html\Form\Formatting\Label;
use Nemundo\Html\Form\Input\RadioInput;
use Nemundo\Html\Paragraph\Paragraph;


class BootstrapRadioGroup extends AbstractRadioGroup
{

    /**
     * @var bool
     */
    public $inline = false;

    public function getContent()
    {

        $this->prepareHtml();

        $span = new Paragraph($this);
        $span->content = $this->label;

        $this->tagName = 'div';
        $this->addCssClass('form-group');


        foreach ($this->listItemList as $listItem) {

            $div = new Div($this);
            $div->addCssClass('form-check');

            if ($this->inline) {
                $div->addCssClass('form-check-inline');
            }

            $radioButton = new RadioInput($this);
            $radioButton->name = $this->name;
            $radioButton->id = (new RandomText())->getText();
            $radioButton->value = $listItem->value;
            if ($this->value == $listItem->value) {
                $radioButton->checked = true;
            }
            $radioButton->addCssClass('form-check-label');

            $radioLabel = new Label($this);
            $radioLabel->for = $radioButton->id;
            $radioLabel->content = $listItem->label;

        }

        return parent::getContent();

    }

}