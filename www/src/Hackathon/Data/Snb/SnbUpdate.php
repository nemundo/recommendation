<?php
namespace Hackathon\Data\Snb;
use Nemundo\Model\Data\AbstractModelUpdate;
class SnbUpdate extends AbstractModelUpdate {
/**
* @var SnbModel
*/
public $model;

/**
* @var int
*/
public $month;

/**
* @var int
*/
public $year;

/**
* @var int
*/
public $devisen;

public function __construct() {
parent::__construct();
$this->model = new SnbModel();
}
public function update() {
$this->typeValueList->setModelValue($this->model->month, $this->month);
$this->typeValueList->setModelValue($this->model->year, $this->year);
$this->typeValueList->setModelValue($this->model->devisen, $this->devisen);
parent::update();
}
}