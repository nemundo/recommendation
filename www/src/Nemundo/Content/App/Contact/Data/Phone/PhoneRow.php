<?php
namespace Nemundo\Content\App\Contact\Data\Phone;
class PhoneRow extends \Nemundo\Model\Row\AbstractModelDataRow {
/**
* @var \Nemundo\Model\Row\AbstractModelDataRow
*/
private $row;

/**
* @var PhoneModel
*/
public $model;

/**
* @var string
*/
public $id;

/**
* @var string
*/
public $phone;

public function __construct(\Nemundo\Db\Row\AbstractDataRow $row, $model) {
parent::__construct($row->getData());
$this->row = $row;
$this->id = $this->getModelValue($model->id);
$this->phone = $this->getModelValue($model->phone);
}
}