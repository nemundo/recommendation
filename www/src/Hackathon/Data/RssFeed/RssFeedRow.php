<?php
namespace Hackathon\Data\RssFeed;
class RssFeedRow extends \Nemundo\Model\Row\AbstractModelDataRow {
/**
* @var \Nemundo\Model\Row\AbstractModelDataRow
*/
private $row;

/**
* @var RssFeedModel
*/
public $model;

/**
* @var string
*/
public $id;

/**
* @var string
*/
public $rssUrl;

/**
* @var string
*/
public $feedTitle;

public function __construct(\Nemundo\Db\Row\AbstractDataRow $row, $model) {
parent::__construct($row->getData());
$this->row = $row;
$this->id = $this->getModelValue($model->id);
$this->rssUrl = $this->getModelValue($model->rssUrl);
$this->feedTitle = $this->getModelValue($model->feedTitle);
}
}