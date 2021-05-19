<?php
namespace Nemundo\Content\App\Feed\Data\EnclosureType;
class EnclosureTypeRow extends \Nemundo\Model\Row\AbstractModelDataRow {
/**
* @var \Nemundo\Model\Row\AbstractModelDataRow
*/
private $row;

/**
* @var EnclosureTypeModel
*/
public $model;

/**
* @var string
*/
public $id;

/**
* @var string
*/
public $eenclosureType;

public function __construct(\Nemundo\Db\Row\AbstractDataRow $row, $model) {
parent::__construct($row->getData());
$this->row = $row;
$this->id = $this->getModelValue($model->id);
$this->eenclosureType = $this->getModelValue($model->eenclosureType);
}
}