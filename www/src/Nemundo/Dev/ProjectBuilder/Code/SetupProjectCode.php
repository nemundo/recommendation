<?php

namespace Nemundo\Dev\ProjectBuilder\Code;


use Nemundo\Dev\Code\PhpClass;
use Nemundo\Dev\Code\PhpFunction;
use Nemundo\Project\Reset\ProjectReset;
use Nemundo\Project\Setup\AbstractSetup;


class SetupProjectCode extends AbstractProjectCode
{

    public function createCode()
    {

        $phpClass = new PhpClass();
        $phpClass->path = $this->path;
        $phpClass->namespace = $this->prefixNamespace . '\\Setup';
        $phpClass->className = $this->prefixNamespace . 'Setup';
        $phpClass->extendsFromClass = 'AbstractSetup';
        $phpClass->addUseClass(AbstractSetup::class);
        $phpClass->addUseClass('Nemundo\Project\Install\ProjectInstall');
        $phpClass->addUseClass('Nemundo\Dev\Script\AdminBuilderScript');
        $phpClass->addUseClass('Nemundo\App\Script\Setup\ScriptSetup');
        $phpClass->addUseClass(ProjectReset::class);

        $function = new PhpFunction($phpClass);
        $function->functionName = 'run()';

        $function->add('$reset = new ProjectReset();');
        $function->add('$reset->reset();');

        $function->add('(new ProjectInstall())->install();');
        $function->add('(new ScriptSetup())->addScript(new AdminBuilderScript());');

        $function->add('$reset->remove();');

        $phpClass->saveFile();

    }

}