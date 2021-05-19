<?php
namespace Nemundo\Content\Data\ContentTypeCollection;
class ContentTypeCollectionRow extends \Nemundo\Model\Row\AbstractModelDataRow {
/**
* @var \Nemundo\Model\Row\AbstractModelDataRow
*/
private $row;

/**
* @var ContentTypeCollectionModel
*/
public $model;

/**
* @var string
*/
public $id;

/**
* @var string
*/
public $collection;

/**
* @var string
*/
public $phpClass;

public function __construct(\Nemundo\Db\Row\AbstractDataRow $row, $model) {
parent::__construct($row->getData());
$this->row = $row;
$this->id = $this->getModelValue($model->id);
$this->collection = $this->getModelValue($model->collection);
$this->phpClass = $this->getModelValue($model->phpClass);
}
}