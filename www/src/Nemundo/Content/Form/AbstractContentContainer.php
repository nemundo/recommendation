<?php


namespace Nemundo\Content\Form;


use Nemundo\Com\FormBuilder\RedirectTrait;
use Nemundo\Html\Container\AbstractHtmlContainer;

abstract class AbstractContentContainer extends AbstractHtmlContainer
{

    use ContentFormTrait;
    use RedirectTrait;

    public $formName;

}