<?php
namespace Nemundo\Content\App\Team\Data\Team;
class TeamBulk extends \Nemundo\Model\Data\AbstractModelDataBulk {
/**
* @var TeamModel
*/
protected $model;

/**
* @var string
*/
public $team;

public function __construct() {
parent::__construct();
$this->model = new TeamModel();
}
public function save() {
$this->typeValueList->setModelValue($this->model->team, $this->team);
$id = parent::save();
return $id;
}
}