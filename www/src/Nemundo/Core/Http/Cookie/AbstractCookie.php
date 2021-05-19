<?php

namespace Nemundo\Core\Http\Cookie;


use Nemundo\Core\Base\AbstractBaseClass;
use Nemundo\Core\Http\Session\SessionStart;

abstract class AbstractCookie extends AbstractBaseClass
{

    /**
     * @var int
     */
    public $dayOfExpire = 30;

    /**
     * @var string
     */
    protected $cookieName;

    /**
     * @var string
     */
    protected $defaultValue;


    abstract protected function loadCookie();


    public function __construct()
    {
        (new SessionStart())->start();
        $this->loadCookie();
    }


    public function exists()
    {

        $value = false;
        if (isset($_COOKIE[$this->cookieName])) {
            $value = true;
        }
        return $value;
    }


    public function getValue()
    {
        $value = $this->defaultValue;
        if (isset($_COOKIE[$this->cookieName])) {
            $value = $_COOKIE[$this->cookieName];
        }
        return $value;
    }


    public function setValue($value)
    {

        setcookie($this->cookieName, $value, time() + (86400 * $this->dayOfExpire), $this->getPath());

    }


    public function deleteCookie()
    {

        if (isset($_COOKIE[$this->cookieName])) {
            unset($_COOKIE[$this->cookieName]);
            setcookie($this->cookieName, '', time() - 3600, $this->getPath());
        }

    }


    private function getPath()
    {

        //$path = WebConfig::$webUrl;
        $path = '/';
        return $path;

    }


}