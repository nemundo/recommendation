<?php
namespace Nemundo\Content\Index\Geo\Data\Distance;
use Nemundo\Model\Data\AbstractModelUpdate;
class DistanceUpdate extends AbstractModelUpdate {
/**
* @var DistanceModel
*/
public $model;

/**
* @var string
*/
public $contentFromId;

/**
* @var string
*/
public $contentToId;

/**
* @var int
*/
public $distance;

public function __construct() {
parent::__construct();
$this->model = new DistanceModel();
}
public function update() {
$this->typeValueList->setModelValue($this->model->contentFromId, $this->contentFromId);
$this->typeValueList->setModelValue($this->model->contentToId, $this->contentToId);
$this->typeValueList->setModelValue($this->model->distance, $this->distance);
parent::update();
}
}