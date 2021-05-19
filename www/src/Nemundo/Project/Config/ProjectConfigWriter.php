<?php

namespace Nemundo\Project\Config;


use Nemundo\Core\Base\AbstractBaseClass;
use Nemundo\Core\Console\ConsoleInput;
use Nemundo\Core\Type\File\File;

class ProjectConfigWriter extends AbstractBaseClass
{

    /**
     * @var string
     */
    public $filename;

    public function writeFile()
    {

        $file = new File($this->filename);

        if (!$file->fileExists()) {

            $config = new ProjectConfigBuilder();
            $config->filename = $this->filename;

            $input = new ConsoleInput();
            $input->message = 'MySql Host';
            $input->defaultValue = 'localhost';
            $config->mysqlHost = $input->getValue();

            $input = new ConsoleInput();
            $input->message = 'MySql Port';
            $input->defaultValue = 3306;
            $config->mysqlPort = $input->getValue();

            $input = new ConsoleInput();
            $input->message = 'MySql User';
            $input->defaultValue = 'root';
            $config->mysqlUser = $input->getValue();

            $input = new ConsoleInput();
            $input->message = 'MySql Password';
            $config->mysqlPassword = $input->getValue();

            $input = new ConsoleInput();
            $input->message = 'MySql Database';
            $input->defaultValue = 'test_project';
            $config->mysqlDatabase = $input->getValue();

            $input = new ConsoleInput();
            $input->message = 'Web Url';
            $input->defaultValue = '/';
            $config->webUrl = $input->getValue();

            /*
            $input = new ConsoleInput();
            $input->message = 'Smtp Host';
            $config->smtpHost = $input->getValue();

            $input = new ConsoleInput();
            $input->message = 'Smtp Port';
            $input->defaultValue = 465;
            $config->smtpPort = $input->getValue();

            $input = new ConsoleInput();
            $input->message = 'Smtp User';
            $config->smtpUser = $input->getValue();

            $input = new ConsoleInput();
            $input->message = 'Smtp Password';
            $config->smtpPassword = $input->getValue();

            $input = new ConsoleInput();
            $input->message = 'Default Mail Address';
            $config->defaultMailAddress = $input->getValue();

            $input = new ConsoleInput();
            $input->message = 'Default Mail Text';
            $config->defaultMailText = $input->getValue();*/

            $config->writeConfigFile();

        }

    }

}