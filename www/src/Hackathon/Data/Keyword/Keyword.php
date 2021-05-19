<?php
namespace Hackathon\Data\Keyword;
class Keyword extends \Nemundo\Model\Data\AbstractModelData {
/**
* @var KeywordModel
*/
protected $model;

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
public function save() {
$this->typeValueList->setModelValue($this->model->keyword, $this->keyword);
$this->typeValueList->setModelValue($this->model->topicId, $this->topicId);
$id = parent::save();
return $id;
}
}