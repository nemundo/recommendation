<?php
namespace Nemundo\Content\Data\ContentIndex;
use Nemundo\Model\Data\AbstractModelUpdate;
class ContentIndexUpdate extends AbstractModelUpdate {
/**
* @var ContentIndexModel
*/
public $model;

/**
* @var string
*/
public $contentId;

/**
* @var string
*/
public $subject;

public function __construct() {
parent::__construct();
$this->model = new ContentIndexModel();
}
public function update() {
$this->typeValueList->setModelValue($this->model->contentId, $this->contentId);
$this->typeValueList->setModelValue($this->model->subject, $this->subject);
parent::update();
}
}