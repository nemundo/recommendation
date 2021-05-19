<?php
namespace Hackathon\Data\BajourArticle;
class BajourArticleRow extends \Nemundo\Model\Row\AbstractModelDataRow {
/**
* @var \Nemundo\Model\Row\AbstractModelDataRow
*/
private $row;

/**
* @var BajourArticleModel
*/
public $model;

/**
* @var string
*/
public $id;

/**
* @var string
*/
public $uniqueId;

/**
* @var string
*/
public $title;

/**
* @var string
*/
public $lead;

/**
* @var string
*/
public $url;

public function __construct(\Nemundo\Db\Row\AbstractDataRow $row, $model) {
parent::__construct($row->getData());
$this->row = $row;
$this->id = $this->getModelValue($model->id);
$this->uniqueId = $this->getModelValue($model->uniqueId);
$this->title = $this->getModelValue($model->title);
$this->lead = $this->getModelValue($model->lead);
$this->url = $this->getModelValue($model->url);
}
}