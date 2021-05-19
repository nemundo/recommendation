<?php
namespace Nemundo\Content\App\Team\Data\Team;
use Nemundo\Model\Data\AbstractModelUpdate;
class TeamUpdate extends AbstractModelUpdate {
/**
* @var TeamModel
*/
public $model;

/**
* @var string
*/
public $team;

public function __construct() {
parent::__construct();
$this->model = new TeamModel();
}
public function update() {
$this->typeValueList->setModelValue($this->model->team, $this->team);
parent::update();
}
}