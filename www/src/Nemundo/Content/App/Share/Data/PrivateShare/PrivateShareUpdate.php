<?php
namespace Nemundo\Content\App\Share\Data\PrivateShare;
use Nemundo\Model\Data\AbstractModelUpdate;
class PrivateShareUpdate extends AbstractModelUpdate {
/**
* @var PrivateShareModel
*/
public $model;

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
public function update() {
$this->typeValueList->setModelValue($this->model->userId, $this->userId);
$this->typeValueList->setModelValue($this->model->contentId, $this->contentId);
$this->typeValueList->setModelValue($this->model->message, $this->message);
parent::update();
}
}