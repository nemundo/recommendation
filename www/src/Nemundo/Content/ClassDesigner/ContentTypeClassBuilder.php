<?php

namespace Nemundo\Content\ClassDesigner;


use Nemundo\App\ClassDesigner\Builder\AbstractClassBuilder;
use Nemundo\Core\Random\UniqueId;
use Nemundo\Core\Type\Text\Text;
use Nemundo\Dev\Code\PhpClass;
use Nemundo\Dev\Code\PhpFunction;
use Nemundo\Dev\Code\PhpVariable;
use Nemundo\Dev\Code\PhpVisibility;

class ContentTypeClassBuilder extends AbstractClassBuilder
{

    public function buildClass()
    {

        $parameterName = (new Text($this->className))->changeToLowercase()->getValue();
        $namespace = $this->namespace . '\Content\\' . $this->className;

        $typeClassName = $this->className . 'ContentType';

        $phpClass = new PhpClass();
        $phpClass->project = $this->project;
        $phpClass->className = $typeClassName;
        $phpClass->extendsFromClass = 'AbstractContentType';
        $phpClass->namespace = $namespace;
        $phpClass->addUseClass('Nemundo\Content\Type\AbstractContentType');

        $function = new PhpFunction($phpClass);
        $function->visibility = PhpVisibility::ProtectedVariable;
        $function->functionName = 'loadContentType()';
        $function->add('$this->typeLabel = \'' . $this->className . '\';');
        $function->add('$this->typeId = \'' . (new UniqueId())->getUniqueId() . '\';');
        $function->add('$this->formClassList[] = ' . $this->className . 'ContentForm::class;');
        $function->add('$this->viewClassList[] = ' . $this->className . 'ContentView::class;');

        $function = new PhpFunction($phpClass);
        $function->visibility = PhpVisibility::ProtectedVariable;
        $function->functionName = 'onCreate()';

        $function = new PhpFunction($phpClass);
        $function->visibility = PhpVisibility::ProtectedVariable;
        $function->functionName = 'onUpdate()';

        $function = new PhpFunction($phpClass);
        $function->visibility = PhpVisibility::ProtectedVariable;
        $function->functionName = 'onDelete()';

        $function = new PhpFunction($phpClass);
        $function->visibility = PhpVisibility::ProtectedVariable;
        $function->functionName = 'onIndex()';

        $function = new PhpFunction($phpClass);
        $function->visibility = PhpVisibility::ProtectedVariable;
        $function->functionName = 'onDataRow()';

        $function=new PhpFunction($phpClass);
        $function->functionName='getDataRow()';
        $function->returnDataType='\Nemundo\Model\Row\AbstractModelDataRow';
        $function->add('return parent::getDataRow(); ');

        $phpClass->saveFile();

        $contentTypeVariable = new PhpVariable();
        $contentTypeVariable->variableName = 'contentType';
        $contentTypeVariable->dataType = $typeClassName;

        $phpClass = new PhpClass();
        $phpClass->project = $this->project;
        $phpClass->className = $this->className . 'ContentForm';
        $phpClass->extendsFromClass = 'AbstractContentForm';
        $phpClass->namespace = $namespace;
        $phpClass->addUseClass('Nemundo\Content\Form\AbstractContentForm');
        $phpClass->addVariable($contentTypeVariable);

        $function = new PhpFunction($phpClass);
        $function->functionName = 'getContent()';
        $function->add('return parent::getContent();');

        $function = new PhpFunction($phpClass);
        $function->functionName = 'onSubmit()';
        $function->add('$this->contentType->saveType();');


        $phpClass->saveFile();

        $phpClass = new PhpClass();
        $phpClass->project = $this->project;
        $phpClass->className = $this->className . 'ContentView';
        $phpClass->extendsFromClass = 'AbstractContentView';
        $phpClass->namespace = $namespace;
        $phpClass->addUseClass('Nemundo\Content\View\AbstractContentView');
        $phpClass->addVariable($contentTypeVariable);

        $function = new PhpFunction($phpClass);
        $function->visibility=PhpVisibility::ProtectedVariable;
        $function->functionName = 'loadView()';
        $function->add('$this->viewName=\'default\';');
        $function->add('$this->viewId = \'' . (new UniqueId())->getUniqueId() . '\';');
        $function->add('$this->defaultView = true;');

        $function = new PhpFunction($phpClass);
        $function->functionName = 'getContent()';
        $function->add('return parent::getContent();');

        $phpClass->saveFile();

    }

}