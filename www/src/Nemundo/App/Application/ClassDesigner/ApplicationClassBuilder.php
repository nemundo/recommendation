<?php

namespace Nemundo\App\Application\ClassDesigner;


use Nemundo\App\ClassDesigner\Builder\AbstractClassBuilder;
use Nemundo\Core\Random\UniqueId;
use Nemundo\Dev\Code\PhpClass;
use Nemundo\Dev\Code\PhpFunction;
use Nemundo\Dev\Code\PhpVisibility;

class ApplicationClassBuilder extends AbstractClassBuilder
{

    public function buildClass()
    {

        $phpClass = new PhpClass();
        $phpClass->project = $this->project;
        $phpClass->className = $this->className . 'Application';
        $phpClass->extendsFromClass = 'AbstractApplication';
        $phpClass->namespace = $this->namespace . '\Application';
        $phpClass->addUseClass('Nemundo\App\Application\Type\AbstractApplication');

        $function = new PhpFunction($phpClass);
        $function->functionName = 'loadApplication()';
        $function->visibility = PhpVisibility::ProtectedVariable;
        $function->add('$this->application = \'' . $this->className . '\';');
        $function->add('$this->applicationId = \'' . (new UniqueId())->getUniqueId() . '\';');

        $phpClass->saveFile();

    }

}