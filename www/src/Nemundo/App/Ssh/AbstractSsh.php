<?php

namespace Nemundo\App\Ssh;


use Nemundo\Core\Base\AbstractBaseClass;
use Nemundo\Core\Log\LogMessage;

use phpseclib3\Crypt\PublicKeyLoader;
use phpseclib3\Net\SSH2;


abstract class AbstractSsh extends AbstractBaseClass
{

    /**
     * @var SshConnection
     */
    public $connection;

    /**
     * @var SSH2
     */
    protected $ssh;


    public function __construct()
    {

        $this->connection = new SshConnection();

    }


    public function __destruct()
    {
        //$this->disconnect();
    }


    protected function checkVariable()
    {


        if ($this->connection->host == null) {
            (new LogMessage())->writeError('Ssh Host wurde nicht definiert');
            return false;
        }

        if ($this->connection->user == null) {
            (new LogMessage())->writeError('Ssh Host wurde nicht definiert');
            return false;
        }

    }





    protected function connect()
    {

        $this->checkVariable();
        $this->ssh = new SSH2($this->connection->host);  //, $this->connection->port);

        if (!$this->ssh->isConnected()) {


            if ($this->connection->rsaKey !== null) {

                $key = PublicKeyLoader::load($this->connection->rsaKey, $password = false);


                //$rsa = new RSA();
                //$rsa->loadKey($this->connection->rsaKey);
                if (!$this->ssh->login($this->connection->user, $key)) {
                    (new LogMessage())->writeError('SSH Login fehlgeschlagen');
                    return false;
                }

            } else {

                if (!$this->ssh->login($this->connection->user, $this->connection->password)) {
                    (new LogMessage())->writeError('SSH Login fehlgeschlagen');
                    return false;
                }

            }

        }

        return true;

    }

    public function disconnect()
    {
        $this->ssh->disconnect();
    }


}