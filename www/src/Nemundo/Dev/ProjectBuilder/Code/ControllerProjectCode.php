<?php

namespace Nemundo\Dev\ProjectBuilder\Code;


use Nemundo\Dev\Code\PhpClass;
use Nemundo\Dev\Code\PhpFunction;
use Nemundo\Dev\Code\PhpVisibility;

class ControllerProjectCode extends AbstractProjectCode
{

    public function createCode()
    {

        $class = new PhpClass();
        $class->path = $this->path;
        $class->namespace = $this->prefixNamespace . '\\Controller';
        $class->className = $this->prefixNamespace . 'Controller';
        $class->extendsFromClass = 'AbstractWebController';
        $class->addUseClass('Nemundo\Web\Controller\AbstractWebController');

        $function = new PhpFunction($class);
        $function->functionName = 'loadController()';
        $function->visibility = PhpVisibility::ProtectedVariable;

        $class->saveFile();

    }

}