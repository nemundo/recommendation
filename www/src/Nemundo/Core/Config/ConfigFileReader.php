<?php

namespace Nemundo\Core\Config;


use Nemundo\Core\Base\AbstractBaseClass;
use Nemundo\Core\Log\LogMessage;
use Nemundo\Core\Type\File\File;

class ConfigFileReader extends AbstractBaseClass
{

    /**
     * @var string
     */
    public $filename;

    private $loaded = false;

    private $dataList =[];


    public function getValue($variable, $defaultValue = null)
    {

        $value = $defaultValue;

        $this->readFile();

        if (isset($this->dataList[$variable])) {
            $value = trim($this->dataList[$variable]);

        }

        return $value;

    }


    private function readFile()
    {

        if (!$this->loaded) {

            if (!(new File($this->filename))->fileExists()) {
                (new LogMessage())->writeError('Config File does not exist. Filename: ' . $this->filename);
                return;
            }

            $this->dataList = parse_ini_file($this->filename);
            $this->loaded = true;

        }

    }

}