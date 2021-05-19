<?php

namespace Nemundo\App\ClassDesigner\Designer\Usergroup;

use Nemundo\App\ClassDesigner\Builder\AbstractClassBuilder;
use Nemundo\Core\Random\UniqueId;
use Nemundo\Dev\Code\PhpClass;
use Nemundo\Dev\Code\PhpFunction;
use Nemundo\Dev\Code\PhpVisibility;

class UsergroupClassBuilder extends AbstractClassBuilder
{

    public function buildClass()
    {

        $phpClass = new PhpClass();
        $phpClass->project = $this->project;
        $phpClass->className = $this->className . 'Usergroup';
        $phpClass->extendsFromClass = 'AbstractUsergroup';
        $phpClass->namespace = $this->namespace . '\Usergroup';

        $phpClass->addUseClass('Nemundo\User\Usergroup\AbstractUsergroup');

        $function = new PhpFunction($phpClass);
        $function->visibility = PhpVisibility::ProtectedVariable;
        $function->functionName = 'loadUsergroup()';
        $function->add('$this->usergroup = \'' . $this->className . '\';');
        $function->add('$this->usergroupId = \'' . (new UniqueId())->getUniqueId() . '\';');

        $phpClass->saveFile();

    }

}