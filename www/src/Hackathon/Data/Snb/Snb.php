<?php
namespace Hackathon\Data\Snb;
class Snb extends \Nemundo\Model\Data\AbstractModelData {
/**
* @var SnbModel
*/
protected $model;

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
public function save() {
$this->typeValueList->setModelValue($this->model->month, $this->month);
$this->typeValueList->setModelValue($this->model->year, $this->year);
$this->typeValueList->setModelValue($this->model->devisen, $this->devisen);
$id = parent::save();
return $id;
}
}