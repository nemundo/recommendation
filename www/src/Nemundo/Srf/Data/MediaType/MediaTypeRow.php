<?php
namespace Nemundo\Srf\Data\MediaType;
class MediaTypeRow extends \Nemundo\Model\Row\AbstractModelDataRow {
/**
* @var \Nemundo\Model\Row\AbstractModelDataRow
*/
private $row;

/**
* @var MediaTypeModel
*/
public $model;

/**
* @var string
*/
public $id;

/**
* @var string
*/
public $media;

public function __construct(\Nemundo\Db\Row\AbstractDataRow $row, $model) {
parent::__construct($row->getData());
$this->row = $row;
$this->id = $this->getModelValue($model->id);
$this->media = $this->getModelValue($model->media);
}
}