<?php


namespace Nemundo\App\SqLite\Connection;


use Nemundo\App\SqLite\SqLiteConfig;
use Nemundo\Db\Provider\SqLite\Connection\SqLiteConnection;

class FilenameConnection extends SqLiteConnection
{

    protected function loadConnection()
    {

        $this->filename = SqLiteConfig::$sqLiteFilename;

    }

}