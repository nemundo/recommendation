<?php

namespace Nemundo\Core\Log;


use Nemundo\Core\Base\AbstractBaseClass;
use Nemundo\Core\Path\Path;
use Nemundo\Core\Type\DateTime\Date;
use Nemundo\Core\Type\Text\Text;

class LogFile extends AbstractBaseClass
{

    /**
     * @var bool
     */
    public $throwException = true;

    public function writeError($message)
    {

        $datumText = new Text((new Date())->setNow()->getIsoDate());

        $filename = (new Path())
            ->addPath(LogConfig::$logPath)
            ->addPath($datumText->getValue() . '.txt')
            ->getFilename();

        $message = date('Y-m-d H:i:s') . ' ' . $message;
        $file = fopen($filename, 'a');
        fwrite($file, $message . PHP_EOL);
        fclose($file);

        if ($this->throwException) {
            throw new \Exception($message);
        }

    }


}