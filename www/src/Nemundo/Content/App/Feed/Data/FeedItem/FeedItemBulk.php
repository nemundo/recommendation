<?php
namespace Nemundo\Content\App\Feed\Data\FeedItem;
class FeedItemBulk extends \Nemundo\Model\Data\AbstractModelDataBulk {
/**
* @var FeedItemModel
*/
protected $model;

/**
* @var string
*/
public $feedId;

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

public function __construct() {
parent::__construct();
$this->model = new FeedItemModel();
$this->dateTime = new \Nemundo\Core\Type\DateTime\DateTime();
}
public function save() {
$this->typeValueList->setModelValue($this->model->feedId, $this->feedId);
$this->typeValueList->setModelValue($this->model->title, $this->title);
$this->typeValueList->setModelValue($this->model->description, $this->description);
$this->typeValueList->setModelValue($this->model->url, $this->url);
$property = new \Nemundo\Model\Data\Property\DateTime\DateTimeDataProperty($this->model->dateTime, $this->typeValueList);
$property->setValue($this->dateTime);
$this->typeValueList->setModelValue($this->model->imageUrl, $this->imageUrl);
$this->typeValueList->setModelValue($this->model->hasImage, $this->hasImage);
$this->typeValueList->setModelValue($this->model->hasAudio, $this->hasAudio);
$this->typeValueList->setModelValue($this->model->audioUrl, $this->audioUrl);
$id = parent::save();
return $id;
}
}