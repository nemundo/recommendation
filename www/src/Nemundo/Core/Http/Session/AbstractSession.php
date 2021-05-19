<?php

namespace Nemundo\Core\Http\Session;


use Nemundo\Core\Base\AbstractBaseClass;


abstract class AbstractSession extends AbstractBaseClass
{

    /**
     * @var string
     */
    protected $sessionName;

    /**
     * @var string
     */
    protected $defaultValue;


    abstract protected function loadSession();


    public function __construct()
    {

        (new SessionStart())->start();
        $this->loadSession();

    }


    // hasValue


    public function exists()
    {

        $value = false;
        if (isset($_SESSION[$this->sessionName])) {
            $value = true;
        }
        return $value;
    }


    public function hasValue()
    {

        $returnValue = true;

        //$value =$this->getValue();

        $value = $this->defaultValue;
        if (isset($_SESSION[$this->sessionName])) {
            $value = $_SESSION[$this->sessionName];
        }

        if (($value == '') || ($value == null)) {
            $returnValue = false;
        }

        return $returnValue;

    }


    public function getValue()
    {

        $value = $this->defaultValue;
        if (isset($_SESSION[$this->sessionName])) {
            $value = $_SESSION[$this->sessionName];
        }
        return $value;
    }

    public function setValue($value)
    {
        $_SESSION[$this->sessionName] = $value;
    }

    public function deleteSession()
    {
        unset($_SESSION[$this->sessionName]);
    }

}