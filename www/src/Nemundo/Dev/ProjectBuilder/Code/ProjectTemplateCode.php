<?php

namespace Nemundo\Dev\ProjectBuilder\Code;


use Nemundo\Dev\Code\PhpClass;

class ProjectTemplateCode extends AbstractProjectCode
{

    public function createCode()
    {

        $class = new PhpClass();
        $class->path = $this->path;
        $class->namespace = $this->prefixNamespace . '\\Template';
        $class->className = $this->prefixNamespace . 'Template';
        $class->extendsFromClass = 'HtmlDocument';
        $class->addUseClass('Nemundo\Html\Document\HtmlDocument');
        $class->saveFile();

    }

}