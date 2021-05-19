<?php

namespace Nemundo\Dev\ProjectBuilder\Code;


use Nemundo\Dev\Code\PhpClass;
use Nemundo\Dev\Code\PhpFunction;

class PageProjectCode extends AbstractProjectCode
{

    /**
     * @var string
     */
    public $pageClassName;

    public function createCode()
    {
        $class = new PhpClass();
        $class->path = $this->path;
        $class->namespace = $this->prefixNamespace . '\\Page';
        $class->className = $this->pageClassName . 'Page';

        $function = new PhpFunction($class);
        $function->functionName = 'getContent()';
        $function->add('return parent::getContent();');

        $class->saveFile();

    }

}