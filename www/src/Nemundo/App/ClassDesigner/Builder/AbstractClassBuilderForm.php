<?php

namespace Nemundo\App\ClassDesigner\Builder;


use Nemundo\Admin\Com\Button\AdminSubmitButton;
use Nemundo\Admin\Com\Form\AbstractAdminForm;
use Nemundo\App\ModelDesigner\Jquery\DisableSpaceKeyJquery;
use Nemundo\App\ModelDesigner\Json\AppJson;
use Nemundo\App\ModelDesigner\Json\ProjectJson;
use Nemundo\Com\Container\LibraryTrait;
use Nemundo\Com\FormBuilder\AbstractFormBuilder;
use Nemundo\Package\Bootstrap\FormElement\BootstrapListBox;
use Nemundo\Package\Bootstrap\FormElement\BootstrapTextBox;

abstract class AbstractClassBuilderForm extends AbstractFormBuilder
{

    use LibraryTrait;

    /**
     * @var string
     */
    public $formTitle;

    /**
     * @var ProjectJson
     */
    public $project;

    /**
     * @var AppJson
     */
    public $app;

    /**
     * @var BootstrapListBox
     */
    protected $className;


    protected function loadContainer()
    {

        parent::loadContainer();
        $this->className = new BootstrapTextBox($this);
        $this->className->name='class_name';
        $this->className->label = 'Class Name';
        $this->className->validation = true;



    }


    public function getContent()
    {

        //$this->addJqueryScript((new DisableSpaceKeyJquery())->getCode($this->className->name));


        $btn = new AdminSubmitButton($this);
        $btn->label = 'Create Class';

        return parent::getContent();

    }

}