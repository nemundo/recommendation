<?php
namespace Nemundo\Content\App\Podcast\Data\Episode;
use Nemundo\Model\Data\AbstractModelUpdate;
class EpisodeUpdate extends AbstractModelUpdate {
/**
* @var EpisodeModel
*/
public $model;

/**
* @var string
*/
public $podcastId;

/**
* @var string
*/
public $title;

/**
* @var string
*/
public $text;

/**
* @var string
*/
public $audioUrl;

/**
* @var \Nemundo\Core\Type\DateTime\DateTime
*/
public $dateTime;

/**
* @var int
*/
public $length;

public function __construct() {
parent::__construct();
$this->model = new EpisodeModel();
$this->dateTime = new \Nemundo\Core\Type\DateTime\DateTime();
}
public function update() {
$this->typeValueList->setModelValue($this->model->podcastId, $this->podcastId);
$this->typeValueList->setModelValue($this->model->title, $this->title);
$this->typeValueList->setModelValue($this->model->text, $this->text);
$this->typeValueList->setModelValue($this->model->audioUrl, $this->audioUrl);
$property = new \Nemundo\Model\Data\Property\DateTime\DateTimeDataProperty($this->model->dateTime, $this->typeValueList);
$property->setValue($this->dateTime);
$this->typeValueList->setModelValue($this->model->length, $this->length);
parent::update();
}
}