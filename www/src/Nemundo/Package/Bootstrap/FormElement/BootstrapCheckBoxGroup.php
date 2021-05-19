<?php

namespace Nemundo\Package\Bootstrap\FormElement;


use Nemundo\Com\FormBuilder\Item\AbstractRadioGroup;
use Nemundo\Com\FormBuilder\Item\ListItem;
use Nemundo\Core\Http\Request\Post\PostRequest;
use Nemundo\Core\Random\RandomText;
use Nemundo\Html\Block\Div;
use Nemundo\Html\Form\Formatting\Label;
use Nemundo\Html\Form\Input\CheckBoxInput;
use Nemundo\Html\Paragraph\Paragraph;


class BootstrapCheckBoxGroup extends AbstractRadioGroup
{


    /**
     * @var string
     */
    public $prefix = 'group_';

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


            $radioButton = new CheckBoxInput($this);
            $radioButton->name = $this->prefix . $listItem->value;  //  $this->name;
            $radioButton->id = (new RandomText())->getText();
            // static counter

            //$radioButton->value = $listItem->value;
            //if ($this->value == $listItem->value) {
                //if ($listItem->value) {
                $radioButton->checked =$listItem->checked;  // true;
            //}
            $radioButton->addCssClass('form-check-label');

            $radioLabel = new Label($this);
            $radioLabel->for = $radioButton->id;
            $radioLabel->content = $listItem->label;

        }

        return parent::getContent();

    }


    function addItem($id, $label, $checked = false)
    {


        $item = new ListItem();

        $item->label = $label;
        $item->value = $id;
$item->checked = $checked;

        $this->listItemList[] = $item;

        return $this;

    }


    public function getValueList()
    {


        $valueList=[];
        foreach ($this->listItemList as $listItem) {

            $request = new PostRequest($this->prefix. $listItem->value);
            if ($request->existsRequest()) {
                $valueList[]=$listItem->value;
            }


        }

        return $valueList;

    }

}