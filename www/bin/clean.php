<?php

require_once 'config.php';

(new \Nemundo\Db\Provider\MySql\Database\MySqlDatabase())->emptyDatabase();

require 'init.php';
require 'setup.php';
