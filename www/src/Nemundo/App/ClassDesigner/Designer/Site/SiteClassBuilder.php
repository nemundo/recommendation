<?php

namespace Nemundo\App\ClassDesigner\Designer\Site;

use Nemundo\App\ClassDesigner\Builder\AbstractClassBuilder;
use Nemundo\Com\Template\AbstractTemplateDocument;
use Nemundo\Dev\Code\PhpClass;
use Nemundo\Dev\Code\PhpFunction;
use Nemundo\Dev\Code\PhpVisibility;

class SiteClassBuilder extends AbstractClassBuilder
{

    /**
     * @var string
     */
    public $title;

    /**
     * @var string
     */
    public $url;

    /**
     * @var bool
     */
    public $createPageClass = false;


    public function buildClass()
    {

        $siteClass = new PhpClass();
        $siteClass->overwriteExistingPhpFile = false;
        $siteClass->project = $this->project;
        $siteClass->namespace = $this->namespace . '\\Site';
        $siteClass->className = $this->className . 'Site';
        $siteClass->extendsFromClass = 'AbstractSite';
        $siteClass->addUseClass('Nemundo\Web\Site\AbstractSite');

        $function = new PhpFunction($siteClass);
        $function->functionName = 'loadSite()';
        $function->visibility = PhpVisibility::ProtectedVariable;

        $function->add('$this->title = \'' . $this->title . '\';');
        $function->add('$this->url = \'' . $this->url . '\';');

        $loadContentFunction = new PhpFunction($siteClass);
        $loadContentFunction->functionName = 'loadContent()';

        if ($this->createPageClass) {

            $phpClass = new PhpClass();
            $phpClass->project = $this->project;
            $phpClass->namespace = $this->namespace . '\\Page';
            $phpClass->className = $this->className . 'Page';
            $phpClass->extendsFromClass = 'AbstractTemplateDocument';
            $phpClass->addUseClass(AbstractTemplateDocument::class);

            $siteClass->addUseClass($this->namespace . '\\Page\\' . $this->className . 'Page');

            $function = new PhpFunction($phpClass);
            $function->functionName = 'getContent()';
            $function->add('return parent::getContent();');

            $loadContentFunction->add('(new ' . $this->className . 'Page())->render();');

            $phpClass->saveFile();

        }

        $siteClass->saveFile();

    }

}