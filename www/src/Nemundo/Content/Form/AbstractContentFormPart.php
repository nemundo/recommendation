<?php


namespace Nemundo\Content\Form;


use Nemundo\Admin\Com\Form\AbstractAdminForm;
use Nemundo\Content\Parameter\ContentParameter;
use Nemundo\Content\Type\AbstractContentType;
use Nemundo\Core\Debug\Debug;
use Nemundo\Html\Container\AbstractHtmlContainer;

abstract class AbstractContentFormPart extends AbstractHtmlContainer
{

    /**
     * @var AbstractContentType
     */
    public $contentType;

    /**
     * @var string
     */
    public $label;


    abstract public function saveData();


}