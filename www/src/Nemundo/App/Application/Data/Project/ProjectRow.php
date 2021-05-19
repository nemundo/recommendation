<?php
namespace Nemundo\App\Application\Data\Project;
class ProjectRow extends \Nemundo\Model\Row\AbstractModelDataRow {
/**
* @var \Nemundo\Model\Row\AbstractModelDataRow
*/
private $row;

/**
* @var ProjectModel
*/
public $model;

/**
* @var string
*/
public $id;

/**
* @var string
*/
public $project;

/**
* @var string
*/
public $phpClass;

public function __construct(\Nemundo\Db\Row\AbstractDataRow $row, $model) {
parent::__construct($row->getData());
$this->row = $row;
$this->id = $this->getModelValue($model->id);
$this->project = $this->getModelValue($model->project);
$this->phpClass = $this->getModelValue($model->phpClass);
}
}