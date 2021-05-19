<?php
namespace Nemundo\Content\App\Team\Data\Team;
class TeamValue extends \Nemundo\Model\Value\AbstractModelDataValue {
/**
* @var TeamModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new TeamModel();
}
}