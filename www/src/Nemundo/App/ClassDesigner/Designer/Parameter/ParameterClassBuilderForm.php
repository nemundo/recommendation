<?php

namespace Nemundo\App\ClassDesigner\Designer\Parameter;


use Nemundo\App\ClassDesigner\Builder\AbstractClassBuilderForm;


class ParameterClassBuilderForm extends AbstractClassBuilderForm
{

    protected function loadContainer()
    {
        parent::loadContainer();
        $this->formTitle = 'Parameter';
    }


    protected function onSubmit()
    {

        $builder = new ParameterClassBuilder();
        $builder->project = $this->project;
        $builder->className = $this->className->getValue();
        $builder->namespace = $this->app->namespace;
        $builder->buildClass();

    }

}