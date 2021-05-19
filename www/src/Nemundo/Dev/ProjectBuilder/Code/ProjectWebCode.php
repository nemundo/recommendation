<?php

namespace Nemundo\Dev\ProjectBuilder\Code;


use Nemundo\Admin\AdminConfig;
use Nemundo\Dev\Code\PhpClass;
use Nemundo\Dev\Code\PhpFunction;
use Nemundo\Dev\Code\PhpVisibility;
use Nemundo\User\Login\CookieLogin;
use Nemundo\Web\Base\AbstractWeb;
use Nemundo\Web\ResponseConfig;

class ProjectWebCode extends AbstractProjectCode
{

    public function createCode()
    {
        $class = new PhpClass();
        $class->path = $this->path;
        $class->namespace = $this->prefixNamespace . '\\Web';
        $class->className = $this->prefixNamespace . 'Web';
        $class->extendsFromClass = 'AbstractWeb';
        $class->addUseClass(AbstractWeb::class);

        $function = new PhpFunction($class);
        $function->functionName = 'loadWeb()';
        $function->visibility = PhpVisibility::PublicVariable;

        $function->add('(new CookieLogin())->checkLogin();');
        $class->addUseClass(CookieLogin::class);

        $function->add('ResponseConfig::$title = \'\';');
        $function->add('ResponseConfig::$description = \'\';');
        $function->add('ResponseConfig::$imageUrl = null;');
        $function->add('');
        $function->add('');
        $class->addUseClass(ResponseConfig::class);


        $function->add('AdminConfig::$defaultTemplateClassName = DefaultContentTemplate::class;');
        $function->add('AdminConfig::$webController = new ...Controller();');
        $function->add('(new ...Controller())->render();');
        $function->add('');
        $class->addUseClass(AdminConfig::class);


        $class->saveFile();

    }

}