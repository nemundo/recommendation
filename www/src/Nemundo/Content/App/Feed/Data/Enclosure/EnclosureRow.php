<?php
namespace Nemundo\Content\App\Feed\Data\Enclosure;
class EnclosureRow extends \Nemundo\Model\Row\AbstractModelDataRow {
/**
* @var \Nemundo\Model\Row\AbstractModelDataRow
*/
private $row;

/**
* @var EnclosureModel
*/
public $model;

/**
* @var string
*/
public $id;

/**
* @var int
*/
public $feedItemId;

/**
* @var \Nemundo\Content\App\Feed\Data\FeedItem\FeedItemRow
*/
public $feedItem;

public function __construct(\Nemundo\Db\Row\AbstractDataRow $row, $model) {
parent::__construct($row->getData());
$this->row = $row;
$this->id = $this->getModelValue($model->id);
$this->feedItemId = intval($this->getModelValue($model->feedItemId));
if ($model->feedItem !== null) {
$this->loadNemundoContentAppFeedDataFeedItemFeedItemfeedItemRow($model->feedItem);
}
}
private function loadNemundoContentAppFeedDataFeedItemFeedItemfeedItemRow($model) {
$this->feedItem = new \Nemundo\Content\App\Feed\Data\FeedItem\FeedItemRow($this->row, $model);
}
}