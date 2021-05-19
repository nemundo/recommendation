<?php
namespace Nemundo\App\Help\Data\Code;
use Nemundo\Model\Data\AbstractModelUpdate;
class CodeUpdate extends AbstractModelUpdate {
/**
* @var CodeModel
*/
public $model;

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
public function update() {
$this->typeValueList->setModelValue($this->model->topicId, $this->topicId);
$this->typeValueList->setModelValue($this->model->code, $this->code);
$this->typeValueList->setModelValue($this->model->title, $this->title);
parent::update();
}
}