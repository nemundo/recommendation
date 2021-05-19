<?php


namespace Nemundo\App\Apache\Script;


use Nemundo\App\Apache\Builder\HtaccessBuilder;
use Nemundo\App\Script\Type\AbstractConsoleScript;
use Nemundo\Core\Console\ConsoleInput;
use Nemundo\Web\WebConfig;

class HtaccessScript extends AbstractConsoleScript
{

    protected function loadScript()
    {
        $this->scriptName = 'htaccess-build';
    }


    public function run()
    {


        $input = new ConsoleInput();
        $input->message = 'Password Protection [yes/no]';
        $input->defaultValue = 'yes';
        $value = $input->getValue();
        $passwordProtection = false;
        if ($value == 'yes' || $value == 'y') {
            $passwordProtection = true;
        }


        $builder = new HtaccessBuilder();
        $builder->path = WebConfig::$webPath;
        $builder->passwordProtection = $passwordProtection;
        $builder->buildFile();

        if ($passwordProtection) {

            $input = new ConsoleInput();
            $input->message = 'User';
            $input->defaultValue = 'admin';
            $user = $input->getValue();

            $input = new ConsoleInput();
            $input->message = 'Password';
            $input->defaultValue = 'admin';
            $password = $input->getValue();

            $builder->addUser($user, $password);

        }


    }


}