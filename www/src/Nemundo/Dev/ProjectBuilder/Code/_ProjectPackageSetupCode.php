<?php

namespace Nemundo\Dev\ProjectBuilder\Code;


use Nemundo\Dev\Code\PhpClass;
use Nemundo\Dev\Code\PhpFunction;
use Nemundo\Dev\Code\PhpVisibility;

class ProjectPackageSetupCode extends AbstractProjectCode
{

    public function createCode()
    {

        $phpClass = new PhpClass();
        $phpClass->path = $this->path;
        $phpClass->namespace = $this->prefixNamespace . '\\Setup';
        $phpClass->className = $this->prefixNamespace . 'PackageSetup';
        $phpClass->extendsFromClass = 'AbstractConsoleScript';
        $phpClass->addUseClass('Nemundo\App\Script\Type\AbstractConsoleScript');
        $phpClass->addUseClass('Nemundo\Com\Package\PackageSetup');

        $function = new PhpFunction($phpClass);
        $function->functionName = 'loadScript()';
        $function->visibility = PhpVisibility::ProtectedVariable;
        $function->add(' $this->scriptName = \'package-setup\';');

        $function = new PhpFunction($phpClass);
        $function->functionName = 'run()';
        $function->add('$setup = new PackageSetup();');

        $phpClass->saveFile();

    }

}