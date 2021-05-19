<?php

namespace Nemundo\App\Scheduler\ClassDesigner;


use Nemundo\App\ClassDesigner\Builder\AbstractClassBuilderForm;

class SchedulerClassBuilderForm extends AbstractClassBuilderForm
{

    protected function loadContainer()
    {
        parent::loadContainer();
        $this->formTitle = 'Scheduler';
    }


    protected function onSubmit()
    {

        $builder = new SchedulerClassBuilder();
        $builder->project = $this->project;
        $builder->className = $this->className->getValue();
        $builder->namespace = $this->app->namespace;
        $builder->buildClass();


    }

}