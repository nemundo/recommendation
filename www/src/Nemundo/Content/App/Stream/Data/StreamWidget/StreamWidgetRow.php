<?php
namespace Nemundo\Content\App\Stream\Data\StreamWidget;
class StreamWidgetRow extends \Nemundo\Model\Row\AbstractModelDataRow {
/**
* @var \Nemundo\Model\Row\AbstractModelDataRow
*/
private $row;

/**
* @var StreamWidgetModel
*/
public $model;

/**
* @var string
*/
public $id;

/**
* @var int
*/
public $limit;

public function __construct(\Nemundo\Db\Row\AbstractDataRow $row, $model) {
parent::__construct($row->getData());
$this->row = $row;
$this->id = $this->getModelValue($model->id);
$this->limit = intval($this->getModelValue($model->limit));
}
}