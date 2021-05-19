<?php

namespace Nemundo\App\Application\ClassDesigner;


use Nemundo\App\ClassDesigner\Builder\AbstractClassBuilderForm;


class ApplicationClassBuilderForm extends AbstractClassBuilderForm
{

    protected function loadContainer()
    {
        parent::loadContainer();
        $this->formTitle = 'Application';
    }


    protected function onSubmit()
    {

        $builder = new ApplicationClassBuilder();
        $builder->project = $this->project;
        $builder->className = $this->className->getValue();
        $builder->namespace = $this->app->namespace;
        $builder->buildClass();

    }

}