<?php

namespace Nemundo\App\Script\Command;


use Nemundo\App\Script\Data\Script\ScriptCount;
use Nemundo\App\Script\Data\Script\ScriptReader;
use Nemundo\Core\Base\AbstractBaseClass;
use Nemundo\Core\Console\ConsoleArgument;
use Nemundo\Core\Console\ConsoleConfig;

use Nemundo\Core\Debug\Debug;
use Nemundo\Core\Directory\TextDirectory;
use Nemundo\Core\Log\LogConfig;
use Nemundo\Core\Log\LogMessage;
use Nemundo\Core\Log\LogType;


class ScriptConsole extends AbstractBaseClass
{


    public function checkCommand()
    {

        LogConfig::$logType = [LogType::CONSOLE];

        $consoleArgument = new ConsoleArgument();
        $command = $consoleArgument->getValue(1);

        if ($command !== '') {

            $scriptClassCount = new ScriptCount();
            $scriptClassCount->filter->andEqual($scriptClassCount->model->scriptName, $command);

            if ($scriptClassCount->getCount() > 0) {

                $scriptReader = new ScriptReader();
                $scriptReader->filter->andEqual($scriptReader->model->consoleScript, true);
                $scriptReader->filter->andEqual($scriptReader->model->scriptName, $command);
                $scriptRow = $scriptReader->getRow();

                $script = $scriptRow->getScript();
                $script->run();

                /*try {
                    $script->run();
                } catch (\Exception $exception) {
                    (new Debug())->write('Script Error: ' . $exception->getMessage());
                }*/

            } else {

                (new LogMessage())->writeError('No Script found');

                $commandList = new TextDirectory();

                $scriptReader = new ScriptReader();
                $scriptReader->filter->andEqual($scriptReader->model->consoleScript, true);
                $scriptReader->addOrder($scriptReader->model->scriptName);

                foreach ($scriptReader->getData() as $scriptRow) {
                    $commandList->addValue($scriptRow->scriptName);
                }

                (new Debug())->write('Did you mean ' . $commandList->getClosestText($command));

                foreach ($commandList->getClosestTextList($command) as $value) {
                    (new Debug())->write($value);
                }

            }

        } else {

            (new Debug())->write('Available Command:');

            $scriptReader = new ScriptReader();
            $scriptReader->filter->andEqual($scriptReader->model->consoleScript, true);
            $scriptReader->addOrder($scriptReader->model->scriptName);

            foreach ($scriptReader->getData() as $scriptRow) {
                (new Debug())->write($scriptRow->scriptName);
            }

        }

    }

}