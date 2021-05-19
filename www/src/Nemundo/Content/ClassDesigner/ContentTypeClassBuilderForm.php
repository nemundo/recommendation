<?php

namespace Nemundo\Content\ClassDesigner;


use Nemundo\App\ClassDesigner\Builder\AbstractClassBuilderForm;

class ContentTypeClassBuilderForm extends AbstractClassBuilderForm
{

    protected function loadContainer()
    {
        parent::loadContainer();
        $this->formTitle = 'Content Type';
    }


    protected function onSubmit()
    {

        $builder = new ContentTypeClassBuilder();
        $builder->project = $this->project;
        $builder->className = $this->className->getValue();
        $builder->namespace = $this->app->namespace;
        $builder->buildClass();

    }

}