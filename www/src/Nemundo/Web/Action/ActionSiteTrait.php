<?php

namespace Nemundo\Web\Action;


use Nemundo\Web\Parameter\UrlParameter;

trait ActionSiteTrait
{

    /**
     * @var string
     */
    public $actionName = 'index';

    /**
     * @var \Closure
     */
    public $onAction;

    // onLoad



    public function setActionName($actionName) {

        $this->actionName=$actionName;

        $parameter = new UrlParameter();
        $parameter->parameterName ='action';  // $this->actionParameterName;
        $parameter->setValue($actionName);
        $this->addParameter($parameter);


    }


}