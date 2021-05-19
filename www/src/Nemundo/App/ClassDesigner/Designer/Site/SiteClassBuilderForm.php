<?php

namespace Nemundo\App\ClassDesigner\Designer\Site;


use Nemundo\App\ClassDesigner\Builder\AbstractClassBuilderForm;
use Nemundo\App\ModelDesigner\Jquery\DisableSpaceKeyJquery;
use Nemundo\Com\Container\LibraryTrait;
use Nemundo\Package\Bootstrap\FormElement\BootstrapCheckBox;
use Nemundo\Package\Bootstrap\FormElement\BootstrapTextBox;

class SiteClassBuilderForm extends AbstractClassBuilderForm
{


    //use LibraryTrait;

    /**
     * @var BootstrapTextBox
     */
    //private $siteClassName;

    /**
     * @var BootstrapTextBox
     */
    private $siteTitle;

    /**
     * @var BootstrapTextBox
     */
    private $siteUrl;

    /**
     * @var BootstrapCheckBox
     */
    private $createPageClass;


    protected function loadContainer()
    {

        parent::loadContainer();
        $this->formTitle = 'Site';

    }


    public function getContent()
    {

        $this->siteTitle = new BootstrapTextBox($this);
        $this->siteTitle->label = 'Title';
        $this->siteTitle->name = 'site_title';
        $this->siteTitle->validation = true;

        /*$this->siteClassName = new BootstrapTextBox($this);
        $this->siteClassName->label = 'Class Name';
        $this->siteClassName->name = 'class_name';
        $this->siteClassName->validation = true;*/


        $this->siteUrl = new BootstrapTextBox($this);
        $this->siteUrl->label = 'Url';
        $this->siteUrl->name = 'site_url';
        $this->siteUrl->validation = true;

        $this->createPageClass = new BootstrapCheckBox($this);
        $this->createPageClass->label = 'Create Page Class';
        $this->createPageClass->value = true;

        //$this->addJqueryScript((new DisableSpaceKeyJquery())->getCode($this->siteClassName->name));
     /*   $this->addJqueryScript((new DisableSpaceKeyJquery())->getCode($this->siteUrl->name));

        $this->addJqueryScript('$("#' . $this->siteTitle->name . '").keyup(function() {');
        $this->addJqueryScript('value = $("#' . $this->siteTitle->name . '" ).val();');
        $this->addJqueryScript('siteClass = value.replace(/ /g, "");');
        //$this->addJqueryScript('tableName = "' . $tableNamePrefix . '" + value.toLowerCase().replace(/ /g, "_");');
        $this->addJqueryScript('siteUrl = value.toLowerCase().replace(/ /g, "-");');
        // $this->addJqueryScript('className = value;');
        //$this->addJqueryScript('namespace = "' . (new Text($namespacePrefix))->replace('\\', '\\\\')->getValue() . '" + value.replace(/ /g, "");');
        $this->addJqueryScript('$("#' . $this->className->name . '" ).val(siteClass);');
        $this->addJqueryScript('$("#' . $this->siteUrl->name . '" ).val(siteUrl);');
        //$this->addJqueryScript('$("#' . $this->modelNamespace->name . '" ).val(namespace);');
        $this->addJqueryScript('});');*/

        return parent::getContent();

    }


    protected function onSubmit()
    {

        $builder = new SiteClassBuilder();
        $builder->project = $this->project;
        $builder->namespace = $this->app->namespace;
        $builder->className = $this->className->getValue();
        $builder->title = $this->siteTitle->getValue();
        $builder->url = $this->siteUrl->getValue();
        $builder->createPageClass = $this->createPageClass->getValue();
        $builder->buildClass();

    }

}