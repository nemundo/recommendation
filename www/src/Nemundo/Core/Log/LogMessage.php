<?php

namespace Nemundo\Core\Log;

use Nemundo\Core\Base\AbstractBase;
use Nemundo\Core\Console\ConsoleMode;
use Nemundo\Core\File\FileUtility;
use Nemundo\Core\Path\Path;
use Nemundo\Core\Type\DateTime\Date;
use Nemundo\Core\Type\DateTime\DateTime;
use Nemundo\Core\Type\Text\Text;


class LogMessage extends AbstractBase
{

    public function writeError($message)
    {

        LogConfig::$errorMessageOccurs = true;

        if (is_array($message)) {
            $message = implode(' - ', $message);
        }

        if ((new ConsoleMode())->isConsole()) {
            LogConfig::$logType = [LogType::CONSOLE];
        }

        foreach (LogConfig::$logType as $logType) {

            switch ($logType) {
                case LogType::SCREEN:
                    echo '<p><b style="color: red;">Error: ' . $message . '</b></p>';
                    break;

                case LogType::CONSOLE:

                    $dateTimeText = (new DateTime())->setNow()->getIsoDateTime();
                    $message =$dateTimeText.' '. $message . PHP_EOL;
                    echo $message;
                    break;

                case LogType::FILE:

                    $datumText = new Text((new Date())->setNow()->getIsoDate());
                    LogMessage::appendTextFile($datumText->getValue() . '.txt', $message);

                    break;

                case LogType::MAIL:
                    echo $message . PHP_EOL;
                    break;

            }
        }


        LogConfig::$errorMessageOccurs = true;

    }


    private static function appendTextFile($filename, $message)
    {

        if (!file_exists(LogConfig::$logPath)) {

            (new Path())
                ->addPath(LogConfig::$logPath)
                ->createPath();

        }

        $message = date("Y-m-d H:i:s") . "\t" . $message;
        $file = fopen((new FileUtility())->appendDirectorySeparatorIfNotExists(LogConfig::$logPath) . $filename, "a");
        fwrite($file, $message . PHP_EOL);
        fclose($file);

    }

}