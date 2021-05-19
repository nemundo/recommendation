<?php
namespace Nemundo\Content\App\Store\Data\NumberStore;
class NumberStoreRow extends \Nemundo\Model\Row\AbstractModelDataRow {
/**
* @var \Nemundo\Model\Row\AbstractModelDataRow
*/
private $row;

/**
* @var NumberStoreModel
*/
public $model;

/**
* @var string
*/
public $id;

/**
* @var int
*/
public $number;

public function __construct(\Nemundo\Db\Row\AbstractDataRow $row, $model) {
parent::__construct($row->getData());
$this->row = $row;
$this->id = $this->getModelValue($model->id);
$this->number = intval($this->getModelValue($model->number));
}
}