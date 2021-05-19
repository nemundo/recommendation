<?php
namespace Nemundo\Content\Data\IndexType;
class IndexTypeRow extends \Nemundo\Model\Row\AbstractModelDataRow {
/**
* @var \Nemundo\Model\Row\AbstractModelDataRow
*/
private $row;

/**
* @var IndexTypeModel
*/
public $model;

/**
* @var string
*/
public $id;

/**
* @var string
*/
public $indexType;

public function __construct(\Nemundo\Db\Row\AbstractDataRow $row, $model) {
parent::__construct($row->getData());
$this->row = $row;
$this->id = $this->getModelValue($model->id);
$this->indexType = $this->getModelValue($model->indexType);
}
}