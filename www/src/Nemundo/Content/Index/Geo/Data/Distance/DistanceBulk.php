<?php
namespace Nemundo\Content\Index\Geo\Data\Distance;
class DistanceBulk extends \Nemundo\Model\Data\AbstractModelDataBulk {
/**
* @var DistanceModel
*/
protected $model;

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
public function save() {
$this->typeValueList->setModelValue($this->model->contentFromId, $this->contentFromId);
$this->typeValueList->setModelValue($this->model->contentToId, $this->contentToId);
$this->typeValueList->setModelValue($this->model->distance, $this->distance);
$id = parent::save();
return $id;
}
}