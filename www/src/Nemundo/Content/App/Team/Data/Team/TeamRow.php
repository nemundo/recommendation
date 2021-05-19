<?php
namespace Nemundo\Content\App\Team\Data\Team;
class TeamRow extends \Nemundo\Model\Row\AbstractModelDataRow {
/**
* @var \Nemundo\Model\Row\AbstractModelDataRow
*/
private $row;

/**
* @var TeamModel
*/
public $model;

/**
* @var string
*/
public $id;

/**
* @var string
*/
public $team;

public function __construct(\Nemundo\Db\Row\AbstractDataRow $row, $model) {
parent::__construct($row->getData());
$this->row = $row;
$this->id = $this->getModelValue($model->id);
$this->team = $this->getModelValue($model->team);
}
}