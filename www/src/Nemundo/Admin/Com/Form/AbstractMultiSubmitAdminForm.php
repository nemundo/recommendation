<?php

namespace Nemundo\Admin\Com\Form;


use Nemundo\Com\FormBuilder\AbstractFormBuilder;
use Nemundo\Core\Http\Request\Post\PostRequest;
use Nemundo\Html\Block\Div;
use Nemundo\Html\Block\Hr;
use Nemundo\Html\Container\AbstractContainer;
use Nemundo\Html\Container\AbstractHtmlContainer;
use Nemundo\Html\Form\Button\SubmitButton;

abstract class AbstractMultiSubmitAdminForm extends AbstractFormBuilder
{

    /**
     * @var SubmitButton[]
     */
    private $buttonList = [];

    /**
     * @var string
     */
    private $buttonName = 'multi_submit';


    protected function addButton($button)
    {
        $this->buttonList[] = $button;
        return $this;
    }


    public function addContainer(AbstractContainer $container)
    {

        if ($container->isObjectOfClass(SubmitButton::class)) {
            $this->addButton($container);
        } else {
            parent::addContainer($container);
        }

    }


    public function getContent()
    {

        (new Hr($this));

        $div = new Div($this);

        foreach ($this->buttonList as $button) {
            $button->name = $this->buttonName;
            $div->addContainer($button);
        }

        return parent::getContent();
    }


    protected function getSubmitButtonValue()
    {

        $parameter = new PostRequest($this->buttonName); // PostParameter();
        //$parameter->parameterName = $this->buttonName;
        $value =$parameter->getValue();

        //$value = (new PostRequest($this->buttonName))->getValue();
        return $value;
    }


    final protected function onSubmit()
    {

        $buttonValue = $this->getSubmitButtonValue();
        $this->$buttonValue();

    }

}