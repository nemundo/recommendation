<?php

namespace Nemundo\App\Scheduler\ClassDesigner;


use Nemundo\App\ClassDesigner\Builder\AbstractClassBuilder;
use Nemundo\App\Scheduler\Job\AbstractScheduler;
use Nemundo\Core\Random\UniqueId;
use Nemundo\Core\Type\Text\Text;
use Nemundo\Dev\Code\PhpClass;
use Nemundo\Dev\Code\PhpFunction;
use Nemundo\Dev\Code\PhpVariable;
use Nemundo\Dev\Code\PhpVisibility;

class SchedulerClassBuilder extends AbstractClassBuilder
{

    public function buildClass()
    {

        $namespace = $this->namespace . '\Scheduler';  // . $this->className;

        $typeClassName = $this->className . 'Scheduler';

        $phpClass = new PhpClass();
        $phpClass->project = $this->project;
        $phpClass->className = $typeClassName;
        $phpClass->extendsFromClass = 'AbstractScheduler';
        $phpClass->namespace = $namespace;
        $phpClass->addUseClass(AbstractScheduler::class);

        $function = new PhpFunction($phpClass);
        $function->visibility = PhpVisibility::ProtectedVariable;
        $function->functionName = 'loadScheduler()';

        $function = new PhpFunction($phpClass);
        $function->functionName = 'run()';

        $phpClass->saveFile();




    }

}