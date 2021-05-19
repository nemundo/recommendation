<?php

namespace Nemundo\Core\Debug;


use Nemundo\Core\Base\AbstractBaseClass;
use Nemundo\Core\Console\ConsoleConfig;
use Nemundo\Core\Console\ConsoleMode;
use Nemundo\Core\Log\LogConfig;

class Debug extends AbstractBaseClass
{


    public function write($text = '')
    {

        $consoleMode = (new ConsoleMode())->isConsole();

        if ($text === null) {
            $text = '(NULL)';
        }

        if ($text === '') {
            $text = '(EMPTY)';
        }

        if ($text === true) {
            $text = '(TRUE)';
        }

        if ($text === false) {
            $text = '(FALSE)';
        }

        if (!$consoleMode) {
            echo '<pre>';
        }

        if ((is_object($text) || (is_array($text)))) {
            print_r($text);
        } else {
            echo $text;
        }

        if (!$consoleMode) {
            echo '</pre>';
        } else {
            echo PHP_EOL;
        }

        if (ConsoleConfig::$fileMode) {

            if ((is_object($text) || (is_array($text)))) {
                print_r($text);
                $var = print_r($text, true);
            } else {
                $var = $text;
            }

            $filename = LogConfig::$logPath . 'console.log';
            file_put_contents($filename, $var . PHP_EOL, FILE_APPEND | LOCK_EX);

        }

    }


    public function writeBoolean($value)
    {

        if ($value) {
            $this->write('Yes');
        } else {
            $this->write('No');
        }

    }


    public function writeHtml($html)
    {

        echo htmlspecialchars($html);

    }

}