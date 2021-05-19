<?php

namespace Nemundo\Db\Provider\SqLite\Connection;


use Nemundo\Core\Log\LogMessage;
use Nemundo\Core\Type\File\File;
use Nemundo\Db\Connection\AbstractConnection;

class SqLiteConnection extends AbstractConnection
{

    /**
     * @var string
     */
    public $filename;

    protected function connect()
    {
        $this->createPdoConnection('sqlite:' . $this->filename);
    }


    public function checkFilename() {

        if (!(new File($this->filename))->fileExists()) {
            (new LogMessage())->writeError('SqLite File does not exist. Filename: '.$this->filename);
            exit;
        }


    }

}