<?php
namespace Nemundo\Content\App\Stream\Data\Stream;
class StreamBulk extends \Nemundo\Model\Data\AbstractModelDataBulk {
/**
* @var StreamModel
*/
protected $model;

/**
* @var string
*/
public $contentId;

/**
* @var bool
*/
public $hasMessage;

/**
* @var string
*/
public $message;

/**
* @var string
*/
public $contentViewId;

/**
* @var bool
*/
public $active;

public function __construct() {
parent::__construct();
$this->model = new StreamModel();
}
public function save() {
$this->typeValueList->setModelValue($this->model->contentId, $this->contentId);
$this->typeValueList->setModelValue($this->model->hasMessage, $this->hasMessage);
$this->typeValueList->setModelValue($this->model->message, $this->message);
$this->typeValueList->setModelValue($this->model->contentViewId, $this->contentViewId);
$this->typeValueList->setModelValue($this->model->active, $this->active);
$id = parent::save();
return $id;
}
}