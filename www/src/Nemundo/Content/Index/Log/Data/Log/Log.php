<?php
namespace Nemundo\Content\Index\Log\Data\Log;
class Log extends \Nemundo\Model\Data\AbstractModelData {
/**
* @var LogModel
*/
protected $model;

/**
* @var string
*/
public $contentLogId;

/**
* @var string
*/
public $contentItemId;

public function __construct() {
parent::__construct();
$this->model = new LogModel();
}
public function save() {
$this->typeValueList->setModelValue($this->model->contentLogId, $this->contentLogId);
$this->typeValueList->setModelValue($this->model->contentItemId, $this->contentItemId);
$id = parent::save();
return $id;
}
}