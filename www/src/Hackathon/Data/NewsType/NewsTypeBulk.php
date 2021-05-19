<?php
namespace Hackathon\Data\NewsType;
class NewsTypeBulk extends \Nemundo\Model\Data\AbstractModelDataBulk {
/**
* @var NewsTypeModel
*/
protected $model;

/**
* @var string
*/
public $contentTypeId;

public function __construct() {
parent::__construct();
$this->model = new NewsTypeModel();
}
public function save() {
$this->typeValueList->setModelValue($this->model->contentTypeId, $this->contentTypeId);
$id = parent::save();
return $id;
}
}