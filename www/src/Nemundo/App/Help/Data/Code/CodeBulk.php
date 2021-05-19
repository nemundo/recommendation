<?php
namespace Nemundo\App\Help\Data\Code;
class CodeBulk extends \Nemundo\Model\Data\AbstractModelDataBulk {
/**
* @var CodeModel
*/
protected $model;

/**
* @var string
*/
public $topicId;

/**
* @var string
*/
public $code;

/**
* @var string
*/
public $title;

public function __construct() {
parent::__construct();
$this->model = new CodeModel();
}
public function save() {
$this->typeValueList->setModelValue($this->model->topicId, $this->topicId);
$this->typeValueList->setModelValue($this->model->code, $this->code);
$this->typeValueList->setModelValue($this->model->title, $this->title);
$id = parent::save();
return $id;
}
}