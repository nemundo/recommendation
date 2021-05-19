<?php
namespace Hackathon\Data\NewsIndex;
use Nemundo\Model\Data\AbstractModelUpdate;
class NewsIndexUpdate extends AbstractModelUpdate {
/**
* @var NewsIndexModel
*/
public $model;

/**
* @var string
*/
public $title;

/**
* @var string
*/
public $description;

/**
* @var string
*/
public $url;

/**
* @var string
*/
public $sourceId;

/**
* @var string
*/
public $newsTypeId;

public function __construct() {
parent::__construct();
$this->model = new NewsIndexModel();
}
public function update() {
$this->typeValueList->setModelValue($this->model->title, $this->title);
$this->typeValueList->setModelValue($this->model->description, $this->description);
$this->typeValueList->setModelValue($this->model->url, $this->url);
$this->typeValueList->setModelValue($this->model->sourceId, $this->sourceId);
$this->typeValueList->setModelValue($this->model->newsTypeId, $this->newsTypeId);
parent::update();
}
}