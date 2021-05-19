<?php
namespace Hackathon\Data\WordIndex;
class WordIndexRow extends \Nemundo\Model\Row\AbstractModelDataRow {
/**
* @var \Nemundo\Model\Row\AbstractModelDataRow
*/
private $row;

/**
* @var WordIndexModel
*/
public $model;

/**
* @var string
*/
public $id;

/**
* @var int
*/
public $wordId;

/**
* @var \Hackathon\Data\Word\WordRow
*/
public $word;

/**
* @var int
*/
public $newsId;

/**
* @var \Hackathon\Data\NewsIndex\NewsIndexRow
*/
public $news;

public function __construct(\Nemundo\Db\Row\AbstractDataRow $row, $model) {
parent::__construct($row->getData());
$this->row = $row;
$this->id = $this->getModelValue($model->id);
$this->wordId = intval($this->getModelValue($model->wordId));
if ($model->word !== null) {
$this->loadHackathonDataWordWordwordRow($model->word);
}
$this->newsId = intval($this->getModelValue($model->newsId));
if ($model->news !== null) {
$this->loadHackathonDataNewsIndexNewsIndexnewsRow($model->news);
}
}
private function loadHackathonDataWordWordwordRow($model) {
$this->word = new \Hackathon\Data\Word\WordRow($this->row, $model);
}
private function loadHackathonDataNewsIndexNewsIndexnewsRow($model) {
$this->news = new \Hackathon\Data\NewsIndex\NewsIndexRow($this->row, $model);
}
}