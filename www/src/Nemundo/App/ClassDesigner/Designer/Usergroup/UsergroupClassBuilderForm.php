<?php


namespace Nemundo\App\ClassDesigner\Designer\Usergroup;


use Nemundo\App\ClassDesigner\Builder\AbstractClassBuilderForm;
use Nemundo\Package\Bootstrap\FormElement\BootstrapTextBox;

class UsergroupClassBuilderForm extends AbstractClassBuilderForm
{

    /**
     * @var BootstrapTextBox
     */
    //private $usergroup;


    protected function loadContainer()
    {
        parent::loadContainer();
        $this->formTitle = 'Usergroup';
    }

    /*
    public function getContent()
    {

        $this->usergroup = new BootstrapTextBox($this);
        $this->usergroup->label = 'Usergroup Class Name';
        $this->usergroup->validation = true;

        return parent::getContent();

    }*/

    protected function onSubmit()
    {

        $builder = new UsergroupClassBuilder();
        $builder->project = $this->project;
        $builder->className = $this->className->getValue();
        $builder->namespace = $this->app->namespace;
        $builder->buildClass();

    }

}