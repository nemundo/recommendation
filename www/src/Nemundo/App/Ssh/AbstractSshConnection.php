<?php

namespace Nemundo\App\Ssh;


use Nemundo\Core\Base\AbstractBase;

abstract class AbstractSshConnection extends AbstractBase
{

    /**
     * @var string
     */
    public $host;

    /**
     * @var string
     */
    public $user;

    /**
     * @var string
     */
    public $password;

    public $rsaKey;

    /**
     * @var int
     */
    public $port = 22;


    abstract protected function loadConnection();

    public function __construct()
    {
        $this->loadConnection();
    }

}