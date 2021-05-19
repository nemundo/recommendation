<?php
namespace Hackathon\Data\WordIndex;
class WordIndexBulk extends \Nemundo\Model\Data\AbstractModelDataBulk {
/**
* @var WordIndexModel
*/
protected $model;

/**
* @var string
*/
public $wordId;

/**
* @var string
*/
public $newsId;

public function __construct() {
parent::__construct();
$this->model = new WordIndexModel();
}
public function save() {
$this->typeValueList->setModelValue($this->model->wordId, $this->wordId);
$this->typeValueList->setModelValue($this->model->newsId, $this->newsId);
$id = parent::save();
return $id;
}
}