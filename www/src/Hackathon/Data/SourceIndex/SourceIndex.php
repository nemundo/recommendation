<?php
namespace Hackathon\Data\SourceIndex;
class SourceIndex extends \Nemundo\Model\Data\AbstractModelData {
/**
* @var SourceIndexModel
*/
protected $model;

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
public function save() {
$this->typeValueList->setModelValue($this->model->source, $this->source);
$this->typeValueList->setModelValue($this->model->uniqueUrl, $this->uniqueUrl);
$this->typeValueList->setModelValue($this->model->newsTypeId, $this->newsTypeId);
$id = parent::save();
return $id;
}
}