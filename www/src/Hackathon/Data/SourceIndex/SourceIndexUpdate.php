<?php
namespace Hackathon\Data\SourceIndex;
use Nemundo\Model\Data\AbstractModelUpdate;
class SourceIndexUpdate extends AbstractModelUpdate {
/**
* @var SourceIndexModel
*/
public $model;

/**
* @var string
*/
public $source;

/**
* @var string
*/
public $uniqueUrl;

/**
* @var string
*/
public $newsTypeId;

public function __construct() {
parent::__construct();
$this->model = new SourceIndexModel();
}
public function update() {
$this->typeValueList->setModelValue($this->model->source, $this->source);
$this->typeValueList->setModelValue($this->model->uniqueUrl, $this->uniqueUrl);
$this->typeValueList->setModelValue($this->model->newsTypeId, $this->newsTypeId);
parent::update();
}
}