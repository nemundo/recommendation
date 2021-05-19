<?php
namespace Nemundo\Content\App\Feed\Data\WebCrawler;
use Nemundo\Model\Data\AbstractModelUpdate;
class WebCrawlerUpdate extends AbstractModelUpdate {
/**
* @var WebCrawlerModel
*/
public $model;

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
public function update() {
$this->typeValueList->setModelValue($this->model->phpClass, $this->phpClass);
$this->typeValueList->setModelValue($this->model->setupStatus, $this->setupStatus);
parent::update();
}
}