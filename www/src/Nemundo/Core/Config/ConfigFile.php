<?php

namespace Nemundo\Core\Config;


use Nemundo\Core\Base\AbstractBase;
use Nemundo\Core\TextFile\Writer\TextFileWriter;

class ConfigFile extends AbstractBase
{

    /**
     * @var string
     */
    private $filename;

    private $dataList = [];

    public function __construct($filename)
    {

        $this->filename = $filename;

        if (file_exists($this->filename)) {
            $this->dataList = parse_ini_file($this->filename);
        }

    }


    public function setValue($name, $value = '')
    {

        $this->dataList[$name] = $value;
        return $this;

    }


    public function getValue($name)
    {

        $value = null;
        //if (isset($this->dataList[$name])) {
        if ($this->existsValue($name)) {
            $value = $this->dataList[$name];
        }

        return $value;

    }


    public function existsValue($name)
    {

        $value = false;
        if (isset($this->dataList[$name])) {
            $value = true;
        }

        return $value;

    }





    public function writeFile()
    {

        $textFile = new TextFileWriter($this->filename);
        $textFile->overwriteExistingFile = true;
        foreach ($this->dataList as $key => $value) {
            $textFile->addLine($key . '=' . $value);
        }
        $textFile->saveFile();

    }

}