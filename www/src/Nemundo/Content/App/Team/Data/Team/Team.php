<?php
namespace Nemundo\Content\App\Team\Data\Team;
class Team extends \Nemundo\Model\Data\AbstractModelData {
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