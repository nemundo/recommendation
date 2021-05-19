<?php
namespace Nemundo\Content\Data\ContentIndex;
class ContentIndex extends \Nemundo\Model\Data\AbstractModelData {
/**
* @var ContentIndexModel
*/
protected $model;

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
public function save() {
$this->typeValueList->setModelValue($this->model->contentId, $this->contentId);
$this->typeValueList->setModelValue($this->model->subject, $this->subject);
$id = parent::save();
return $id;
}
}