<?php
namespace Nemundo\Content\Index\Log\Data\Log;
use Nemundo\Model\Data\AbstractModelUpdate;
class LogUpdate extends AbstractModelUpdate {
/**
* @var LogModel
*/
public $model;

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
public function update() {
$this->typeValueList->setModelValue($this->model->contentLogId, $this->contentLogId);
$this->typeValueList->setModelValue($this->model->contentItemId, $this->contentItemId);
parent::update();
}
}