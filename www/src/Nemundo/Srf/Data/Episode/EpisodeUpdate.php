<?php
namespace Nemundo\Srf\Data\Episode;
use Nemundo\Model\Data\AbstractModelUpdate;
class EpisodeUpdate extends AbstractModelUpdate {
/**
* @var EpisodeModel
*/
public $model;

/**
* @var string
*/
public $showId;

/**
* @var string
*/
public $urn;

/**
* @var string
*/
public $title;

/**
* @var string
*/
public $description;

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
$this->typeValueList->setModelValue($this->model->showId, $this->showId);
$this->typeValueList->setModelValue($this->model->urn, $this->urn);
$this->typeValueList->setModelValue($this->model->title, $this->title);
$this->typeValueList->setModelValue($this->model->description, $this->description);
$property = new \Nemundo\Model\Data\Property\DateTime\DateTimeDataProperty($this->model->dateTime, $this->typeValueList);
$property->setValue($this->dateTime);
$this->typeValueList->setModelValue($this->model->length, $this->length);
parent::update();
}
}