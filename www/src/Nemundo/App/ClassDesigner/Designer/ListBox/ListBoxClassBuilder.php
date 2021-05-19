<?php


namespace Nemundo\App\ClassDesigner\Designer\ListBox;


use Nemundo\App\ClassDesigner\Builder\AbstractClassBuilder;
use Nemundo\Dev\Code\PhpClass;
use Nemundo\Dev\Code\PhpFunction;
use Nemundo\Dev\Code\PhpVisibility;
use Nemundo\Package\Bootstrap\FormElement\BootstrapListBox;

class ListBoxClassBuilder extends AbstractClassBuilder
{

    public function buildClass()
    {

        $phpClass = new PhpClass();
        $phpClass->project = $this->project;
        $phpClass->className = $this->className . 'ListBox';
        $phpClass->extendsFromClass = 'BootstrapListBox';
        $phpClass->namespace = $this->namespace . '\Com\ListBox';

        $phpClass->addUseClass(BootstrapListBox::class);

        $function = new PhpFunction($phpClass);
        $function->functionName = 'getContent()';

        $function->add('$this->label=\''.$this->className.'\';');
        $function->add('return parent::getContent();');

        $phpClass->saveFile();

    }

}