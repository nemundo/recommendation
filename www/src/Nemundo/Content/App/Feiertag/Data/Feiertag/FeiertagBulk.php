<?php
namespace Nemundo\Content\App\Feiertag\Data\Feiertag;
class FeiertagBulk extends \Nemundo\Model\Data\AbstractModelDataBulk {
/**
* @var FeiertagModel
*/
protected $model;

/**
* @var \Nemundo\Core\Type\DateTime\Date
*/
public $datum;

/**
* @var string
*/
public $feiertag;

public function __construct() {
parent::__construct();
$this->model = new FeiertagModel();
$this->datum = new \Nemundo\Core\Type\DateTime\Date();
}
public function save() {
$property = new \Nemundo\Model\Data\Property\DateTime\DateDataProperty($this->model->datum, $this->typeValueList);
$property->setValue($this->datum);
$this->typeValueList->setModelValue($this->model->feiertag, $this->feiertag);
$id = parent::save();
return $id;
}
}