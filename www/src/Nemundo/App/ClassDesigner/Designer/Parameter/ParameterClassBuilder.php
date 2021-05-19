<?php

namespace Nemundo\App\ClassDesigner\Designer\Parameter;


use Nemundo\App\ClassDesigner\Builder\AbstractClassBuilder;
use Nemundo\Core\Type\Text\Text;
use Nemundo\Dev\Code\PhpClass;
use Nemundo\Dev\Code\PhpFunction;
use Nemundo\Dev\Code\PhpVisibility;

class ParameterClassBuilder extends AbstractClassBuilder
{

    public function buildClass()
    {

        $parameterName = (new Text($this->className))->changeToLowercase()->getValue();

        $phpClass = new PhpClass();
        $phpClass->project = $this->project;
        $phpClass->className = $this->className . 'Parameter';
        $phpClass->extendsFromClass = 'AbstractUrlParameter';
        $phpClass->namespace = $this->namespace . '\Parameter';

        $phpClass->addUseClass('Nemundo\Web\Parameter\AbstractUrlParameter');

        $function = new PhpFunction($phpClass);
        $function->visibility = PhpVisibility::ProtectedVariable;
        $function->functionName = 'loadParameter()';
        $function->add('$this->parameterName = \'' . $parameterName . '\';');

        $phpClass->saveFile();

    }

}