<?php
namespace Nemundo\Content\Data\Content;
class Content extends \Nemundo\Model\Data\AbstractModelData {
/**
* @var ContentModel
*/
protected $model;

/**
* @var string
*/
public $dataId;

/**
* @var string
*/
public $subject;

/**
* @var string
*/
public $contentTypeId;

public function __construct() {
parent::__construct();
$this->model = new ContentModel();
}
public function save() {
$this->typeValueList->setModelValue($this->model->dataId, $this->dataId);
$this->typeValueList->setModelValue($this->model->subject, $this->subject);
$this->typeValueList->setModelValue($this->model->contentTypeId, $this->contentTypeId);
$id = parent::save();
return $id;
}
}