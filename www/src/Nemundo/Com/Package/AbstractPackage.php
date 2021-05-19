<?php

namespace Nemundo\Com\Package;


use Nemundo\Core\Base\AbstractBase;
use Nemundo\Project\AbstractProject;

abstract class AbstractPackage extends AbstractBase
{

    /**
     * @var string
     */
    public $packageName;

    /**
     * @var AbstractProject
     */
    public $project;

    private $jsList = [];

    private $cssList = [];

    private $fontList = [];


    abstract protected function loadPackage();

    public function __construct()
    {
        $this->loadPackage();
    }


    protected function addJs($filename)
    {
        $this->jsList[] = $this->packageName . '/' . $filename;
        return $this;
    }


    protected function addCss($filename)
    {
        $this->cssList[] = $this->packageName . '/' . $filename;
        return $this;
    }

    protected function addFont($filename)
    {
        $this->fontList[] = $filename;
        return $this;
    }


    public function getJs()
    {
        return $this->jsList;
    }


    public function getCss()
    {
        return $this->cssList;
    }

}