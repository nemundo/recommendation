<?php

namespace Nemundo\App\Mail\Connection;


use Nemundo\Core\Base\AbstractBaseClass;

class SmtpConnection extends AbstractBaseClass
{

    /**
     * @var string
     */
    public $host;

    /**
     * @var int
     */
    public $port;

    /**
     * @var bool
     */
    public $authentication = false;

    /**
     * @var string
     */
    public $user;

    /**
     * @var string
     */
    public $password;

}