<?php
namespace Hackathon\Data\Keyword;
use Nemundo\Model\Data\AbstractModelUpdate;
class KeywordUpdate extends AbstractModelUpdate {
/**
* @var KeywordModel
*/
public $model;

/**
* @var string
*/
public $keyword;

/**
* @var string
*/
public $topicId;

public function __construct() {
parent::__construct();
$this->model = new KeywordModel();
}
public function update() {
$this->typeValueList->setModelValue($this->model->keyword, $this->keyword);
$this->typeValueList->setModelValue($this->model->topicId, $this->topicId);
parent::update();
}
}