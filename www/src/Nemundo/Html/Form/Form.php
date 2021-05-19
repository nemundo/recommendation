<?php

namespace Nemundo\Html\Form;

class Form extends AbstractForm
{

    /**
     * @var string
     */
    public $action = '';

    /**
     * @var FormMethod
     */
    public $formMethod = FormMethod::POST;

}
