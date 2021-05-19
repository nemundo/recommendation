<?php

namespace Nemundo\Html\Form;

use Nemundo\Html\Container\AbstractHtmlContainer;


abstract class AbstractForm extends AbstractHtmlContainer
{

    /**
     * @var string
     */
    public $name;

    /**
     * @var string
     */
    protected $action = '';

    /**
     * @var FormMethod
     */
    protected $formMethod = FormMethod::POST;


    public function getContent()
    {

        $this->tagName = 'form';
        $this->addAttribute('name', $this->name);

        // notwendig für File Upload
        if ($this->formMethod == FormMethod::POST) {
            $this->addAttribute('enctype', 'multipart/form-data');
        }

        $this->addAttribute('action', $this->action);
        $this->addAttribute('method', $this->formMethod);

        return parent::getContent();

    }

}
