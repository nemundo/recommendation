<?php

namespace Nemundo\Db\Provider\MySql\Connection;


class MySqlConnectionParameter
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

    /**
     * @var string
     */
    public $database;

    /**
     * @var int
     */
    public $port = 3306;

}