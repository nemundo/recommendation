<?php
namespace Nemundo\Srf\Cms\Data\LivestreamCms;
class LivestreamCmsRow extends \Nemundo\Model\Row\AbstractModelDataRow {
/**
* @var \Nemundo\Model\Row\AbstractModelDataRow
*/
private $row;

/**
* @var LivestreamCmsModel
*/
public $model;

/**
* @var string
*/
public $id;

/**
*/
public $livestreamId;

/**
* @var \Row
*/
public $livestream;

public function __construct(\Nemundo\Db\Row\AbstractDataRow $row, $model) {
parent::__construct($row->getData());
$this->row = $row;
$this->id = $this->getModelValue($model->id);
$this->livestreamId = $this->getModelValue($model->livestreamId);
if ($model->livestream !== null) {
$this->loadlivestreamRow($model->livestream);
}
}
private function loadlivestreamRow($model) {
$this->livestream = new \Row($this->row, $model);
}
}