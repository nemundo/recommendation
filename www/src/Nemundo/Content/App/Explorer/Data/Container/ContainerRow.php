<?php
namespace Nemundo\Content\App\Explorer\Data\Container;
class ContainerRow extends \Nemundo\Model\Row\AbstractModelDataRow {
/**
* @var \Nemundo\Model\Row\AbstractModelDataRow
*/
private $row;

/**
* @var ContainerModel
*/
public $model;

/**
* @var string
*/
public $id;

/**
* @var string
*/
public $description;

/**
* @var \Nemundo\Model\Reader\Property\File\ImageReaderProperty
*/
public $icon;

/**
* @var string
*/
public $container;

public function __construct(\Nemundo\Db\Row\AbstractDataRow $row, $model) {
parent::__construct($row->getData());
$this->row = $row;
$this->id = $this->getModelValue($model->id);
$this->description = $this->getModelValue($model->description);
$this->icon = new \Nemundo\Model\Reader\Property\File\ImageReaderProperty($row, $model->icon);
$this->container = $this->getModelValue($model->container);
}
}