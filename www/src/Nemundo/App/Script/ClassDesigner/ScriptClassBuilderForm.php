<?php

namespace Nemundo\App\Script\ClassDesigner;


use Nemundo\App\ClassDesigner\Builder\AbstractClassBuilderForm;

class ScriptClassBuilderForm extends AbstractClassBuilderForm
{

    protected function loadContainer()
    {
        parent::loadContainer();
        $this->formTitle = 'Script';
    }


    protected function onSubmit()
    {

        $builder = new ScriptClassBuilder();
        $builder->project = $this->project;
        $builder->className = $this->className->getValue();
        $builder->namespace = $this->app->namespace;
        $builder->buildClass();

    }

}