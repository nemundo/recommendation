<?php
namespace Nemundo\Content\Index\Geo\Data\Distance;
class DistanceRow extends \Nemundo\Model\Row\AbstractModelDataRow {
/**
* @var \Nemundo\Model\Row\AbstractModelDataRow
*/
private $row;

/**
* @var DistanceModel
*/
public $model;

/**
* @var string
*/
public $id;

/**
* @var int
*/
public $contentFromId;

/**
* @var \Nemundo\Content\Row\ContentCustomRow
*/
public $contentFrom;

/**
* @var int
*/
public $contentToId;

/**
* @var \Nemundo\Content\Row\ContentCustomRow
*/
public $contentTo;

/**
* @var int
*/
public $distance;

public function __construct(\Nemundo\Db\Row\AbstractDataRow $row, $model) {
parent::__construct($row->getData());
$this->row = $row;
$this->id = $this->getModelValue($model->id);
$this->contentFromId = intval($this->getModelValue($model->contentFromId));
if ($model->contentFrom !== null) {
$this->loadNemundoContentDataContentContentcontentFromRow($model->contentFrom);
}
$this->contentToId = intval($this->getModelValue($model->contentToId));
if ($model->contentTo !== null) {
$this->loadNemundoContentDataContentContentcontentToRow($model->contentTo);
}
$this->distance = intval($this->getModelValue($model->distance));
}
private function loadNemundoContentDataContentContentcontentFromRow($model) {
$this->contentFrom = new \Nemundo\Content\Row\ContentCustomRow($this->row, $model);
}
private function loadNemundoContentDataContentContentcontentToRow($model) {
$this->contentTo = new \Nemundo\Content\Row\ContentCustomRow($this->row, $model);
}
}