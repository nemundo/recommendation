<?php
namespace Nemundo\Content\App\Feiertag\Data\Feiertag;
class FeiertagRow extends \Nemundo\Model\Row\AbstractModelDataRow {
/**
* @var \Nemundo\Model\Row\AbstractModelDataRow
*/
private $row;

/**
* @var FeiertagModel
*/
public $model;

/**
* @var string
*/
public $id;

/**
* @var \Nemundo\Core\Type\DateTime\Date
*/
public $datum;

/**
* @var string
*/
public $feiertag;

public function __construct(\Nemundo\Db\Row\AbstractDataRow $row, $model) {
parent::__construct($row->getData());
$this->row = $row;
$this->id = $this->getModelValue($model->id);
$value = $this->getModelValue($model->datum);
if ($value !== "0000-00-00") {
$this->datum = new \Nemundo\Core\Type\DateTime\Date($this->getModelValue($model->datum));
}
$this->feiertag = $this->getModelValue($model->feiertag);
}
}