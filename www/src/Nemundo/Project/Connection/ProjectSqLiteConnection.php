<?php

namespace Nemundo\Project\Connection;


use Nemundo\Db\Provider\SqLite\Connection\SqLiteConnection;
use Nemundo\Project\Path\ProjectPath;

class ProjectSqLiteConnection extends SqLiteConnection
{

    protected function loadConnection()
    {

        $this->filename = (new ProjectPath())
            ->addPath('db')
            ->addPath('data.db')
            ->getFullFilename();

    }

}