<?php

namespace Nemundo\Dev\ProjectBuilder\Code;


use Nemundo\Core\Type\Text\Text;
use Nemundo\Dev\Code\PhpClass;
use Nemundo\Dev\Code\PhpFunction;

class ProjectProjectCode extends AbstractProjectCode
{

    public function createCode()
    {

        $class = new PhpClass();
        $class->path = $this->path;
        $class->namespace = $this->prefixNamespace;
        $class->className = $this->prefixNamespace . 'Project';
        $class->extendsFromClass = 'AbstractProject';
        $class->addUseClass('Nemundo\Project\AbstractProject');
        $class->addUseClass('Nemundo\Core\Path\Path');

        $function = new PhpFunction($class);
        $function->functionName = 'loadProject()';
        $function->add('$this->project = \'' . $this->prefixNamespace . '\';');
        $function->add('$this->projectName = \'' . (new Text($this->prefixNamespace))->changeToLowercase()->getValue() . '\';');
        $function->add('$this->path = __DIR__;');
        $function->add('$this->namespace = __NAMESPACE__;');

        $function->add('$this->modelPath = (new Path())');
        $function->add('->addPath(__DIR__)');
        $function->add('->addParentPath()');
        $function->add('->addPath("model")');
        $function->add('->getPath();');

        $class->saveFile();

    }

}