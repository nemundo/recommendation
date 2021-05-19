<?php
namespace Nemundo\Content\App\Layout\Data\LayoutColumn;
class LayoutColumnRow extends \Nemundo\Model\Row\AbstractModelDataRow {
/**
* @var \Nemundo\Model\Row\AbstractModelDataRow
*/
private $row;

/**
* @var LayoutColumnModel
*/
public $model;

/**
* @var string
*/
public $id;

/**
* @var int
*/
public $columnWidth;

public function __construct(\Nemundo\Db\Row\AbstractDataRow $row, $model) {
parent::__construct($row->getData());
$this->row = $row;
$this->id = $this->getModelValue($model->id);
$this->columnWidth = intval($this->getModelValue($model->columnWidth));
}
}