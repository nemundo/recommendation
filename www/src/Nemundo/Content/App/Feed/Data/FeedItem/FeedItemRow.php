<?php
namespace Nemundo\Content\App\Feed\Data\FeedItem;
class FeedItemRow extends \Nemundo\Model\Row\AbstractModelDataRow {
/**
* @var \Nemundo\Model\Row\AbstractModelDataRow
*/
private $row;

/**
* @var FeedItemModel
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

/**
* @var string
*/
public $title;

/**
* @var string
*/
public $description;

/**
* @var string
*/
public $url;

/**
* @var \Nemundo\Core\Type\DateTime\DateTime
*/
public $dateTime;

/**
* @var string
*/
public $imageUrl;

/**
* @var bool
*/
public $hasImage;

/**
* @var bool
*/
public $hasAudio;

/**
* @var string
*/
public $audioUrl;

public function __construct(\Nemundo\Db\Row\AbstractDataRow $row, $model) {
parent::__construct($row->getData());
$this->row = $row;
$this->id = $this->getModelValue($model->id);
$this->feedId = intval($this->getModelValue($model->feedId));
if ($model->feed !== null) {
$this->loadNemundoContentAppFeedDataFeedFeedfeedRow($model->feed);
}
$this->title = $this->getModelValue($model->title);
$this->description = $this->getModelValue($model->description);
$this->url = $this->getModelValue($model->url);
$this->dateTime = new \Nemundo\Core\Type\DateTime\DateTime($this->getModelValue($model->dateTime));
$this->imageUrl = $this->getModelValue($model->imageUrl);
$this->hasImage = boolval($this->getModelValue($model->hasImage));
$this->hasAudio = boolval($this->getModelValue($model->hasAudio));
$this->audioUrl = $this->getModelValue($model->audioUrl);
}
private function loadNemundoContentAppFeedDataFeedFeedfeedRow($model) {
$this->feed = new \Nemundo\Content\App\Feed\Data\Feed\FeedRow($this->row, $model);
}
}