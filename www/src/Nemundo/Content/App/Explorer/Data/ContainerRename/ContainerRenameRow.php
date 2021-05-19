<?php
namespace Nemundo\Content\App\Explorer\Data\ContainerRename;
class ContainerRenameRow extends \Nemundo\Model\Row\AbstractModelDataRow {
/**
* @var \Nemundo\Model\Row\AbstractModelDataRow
*/
private $row;

/**
* @var ContainerRenameModel
*/
public $model;

/**
* @var string
*/
public $id;

/**
* @var string
*/
public $containerOld;

/**
* @var string
*/
public $containerNew;

public function __construct(\Nemundo\Db\Row\AbstractDataRow $row, $model) {
parent::__construct($row->getData());
$this->row = $row;
$this->id = $this->getModelValue($model->id);
$this->containerOld = $this->getModelValue($model->containerOld);
$this->containerNew = $this->getModelValue($model->containerNew);
}
}