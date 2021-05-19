<?php
namespace Hackathon\Data\WordIndex;
use Nemundo\Model\Data\AbstractModelUpdate;
class WordIndexUpdate extends AbstractModelUpdate {
/**
* @var WordIndexModel
*/
public $model;

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
public function update() {
$this->typeValueList->setModelValue($this->model->wordId, $this->wordId);
$this->typeValueList->setModelValue($this->model->newsId, $this->newsId);
parent::update();
}
}