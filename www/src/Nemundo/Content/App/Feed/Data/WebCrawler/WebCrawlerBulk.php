<?php
namespace Nemundo\Content\App\Feed\Data\WebCrawler;
class WebCrawlerBulk extends \Nemundo\Model\Data\AbstractModelDataBulk {
/**
* @var WebCrawlerModel
*/
protected $model;

/**
* @var string
*/
public $phpClass;

/**
* @var bool
*/
public $setupStatus;

public function __construct() {
parent::__construct();
$this->model = new WebCrawlerModel();
}
public function save() {
$this->typeValueList->setModelValue($this->model->phpClass, $this->phpClass);
$this->typeValueList->setModelValue($this->model->setupStatus, $this->setupStatus);
$id = parent::save();
return $id;
}
}