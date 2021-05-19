<?php
namespace Nemundo\Content\App\Feed\Data\CmsFeed;
class CmsFeedRow extends \Nemundo\Model\Row\AbstractModelDataRow {
/**
* @var \Nemundo\Model\Row\AbstractModelDataRow
*/
private $row;

/**
* @var CmsFeedModel
*/
public $model;

/**
* @var string
*/
public $id;

/**
* @var int
*/
public $feedId;

/**
* @var \Nemundo\Content\App\Feed\Data\Feed\FeedRow
*/
public $feed;

public function __construct(\Nemundo\Db\Row\AbstractDataRow $row, $model) {
parent::__construct($row->getData());
$this->row = $row;
$this->id = $this->getModelValue($model->id);
$this->feedId = intval($this->getModelValue($model->feedId));
if ($model->feed !== null) {
$this->loadNemundoContentAppFeedDataFeedFeedfeedRow($model->feed);
}
}
private function loadNemundoContentAppFeedDataFeedFeedfeedRow($model) {
$this->feed = new \Nemundo\Content\App\Feed\Data\Feed\FeedRow($this->row, $model);
}
}