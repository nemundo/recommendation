<?php

namespace Nemundo\App\Script\ClassDesigner;


use Nemundo\App\ClassDesigner\Builder\AbstractClassBuilder;
use Nemundo\App\Script\Type\AbstractConsoleScript;
use Nemundo\App\Script\Type\AbstractScript;
use Nemundo\Dev\Code\PhpClass;
use Nemundo\Dev\Code\PhpFunction;
use Nemundo\Dev\Code\PhpVisibility;

class ScriptClassBuilder extends AbstractClassBuilder
{

    public function buildClass()
    {

        $namespace = $this->namespace . '\Script';

        $typeClassName = $this->className . 'Script';

        $phpClass = new PhpClass();
        $phpClass->project = $this->project;
        $phpClass->className = $typeClassName;
        $phpClass->extendsFromClass = 'AbstractConsoleScript';
        $phpClass->namespace = $namespace;
        $phpClass->addUseClass(AbstractConsoleScript::class);

        $function = new PhpFunction($phpClass);
        $function->visibility = PhpVisibility::ProtectedVariable;
        $function->functionName = 'loadScript()';
        $function->add('$this->scriptName = \'\';');

        $function = new PhpFunction($phpClass);
        $function->functionName = 'run()';

        $phpClass->saveFile();

    }

}