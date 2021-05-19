<?php
namespace Nemundo\Content\App\Share\Data\PrivateShare;
class PrivateShare extends \Nemundo\Model\Data\AbstractModelData {
/**
* @var PrivateShareModel
*/
protected $model;

/**
* @var string
*/
public $userId;

/**
* @var string
*/
public $contentId;

/**
* @var string
*/
public $message;

public function __construct() {
parent::__construct();
$this->model = new PrivateShareModel();
}
public function save() {
$this->typeValueList->setModelValue($this->model->userId, $this->userId);
$this->typeValueList->setModelValue($this->model->contentId, $this->contentId);
$this->typeValueList->setModelValue($this->model->message, $this->message);
$id = parent::save();
return $id;
}
}