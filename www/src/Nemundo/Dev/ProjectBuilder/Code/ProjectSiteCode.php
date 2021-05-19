<?php

namespace Nemundo\Dev\ProjectBuilder\Code;


use Nemundo\Core\Text\TextConverter;
use Nemundo\Dev\Code\PhpClass;
use Nemundo\Dev\Code\PhpFunction;
use Nemundo\Dev\Code\PhpVisibility;


class ProjectSiteCode extends AbstractProjectCode
{

    /**
     * @var string
     */
    public $siteClassName;

    public function createCode()
    {
        $class = new PhpClass();
        $class->path = $this->path;
        $class->namespace = $this->prefixNamespace . '\\Site';
        $class->className = $this->siteClassName . 'Site';
        $class->extendsFromClass = 'AbstractSite';
        $class->addUseClass('Nemundo\Web\Site\AbstractSite');

        $function = new PhpFunction($class);
        $function->functionName = 'loadSite()';
        $function->visibility = PhpVisibility::ProtectedVariable;

        $function->add('$this->title = \'' . $this->siteClassName . '\';');
        $function->add('$this->url = \'' . (new TextConverter)->convertToUrl($this->siteClassName) . '\';');

        $function = new PhpFunction($class);
        $function->functionName = 'loadContent()';

        $class->saveFile();
    }


}