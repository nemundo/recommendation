<?php


namespace Nemundo\Dev\Js;


use Nemundo\Com\Package\AbstractPackage;
use Nemundo\Core\Base\AbstractBase;

abstract class AbstractJsPackage extends AbstractBase
{

    /**
     * @var string
     */
    public $basePath;

    /**
     * @var string
     */
    public $baseUrl;


    private $jsList = [];


    abstract protected function loadPackage();

    public function __construct()
    {
        $this->loadPackage();
    }


    public function addJs($filename)
    {

        $this->jsList[] = $filename;

    }


    public function getUrlList()
    {

        $list = [];
        foreach ($this->jsList as $filename) {
            $list[] = $this->baseUrl . $filename;
        }

        return $list;

    }


    public function getFilenameList()
    {

        $list = [];
        foreach ($this->jsList as $filename) {
            $list[] = $this->basePath . $filename;
        }

        return $list;

    }


}