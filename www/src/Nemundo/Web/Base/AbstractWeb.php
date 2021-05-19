<?php

namespace Nemundo\Web\Base;


use Nemundo\Core\Base\AbstractBaseClass;
use Nemundo\Core\Http\Session\SessionConfig;
use Nemundo\Web\WebConfig;

abstract class AbstractWeb extends AbstractBaseClass
{

//    public $webPath;

//    public $webUrl = '/';


    public function __construct()
    {

        SessionConfig::$path = WebConfig::$webUrl;

    }

    abstract public function loadWeb();

}