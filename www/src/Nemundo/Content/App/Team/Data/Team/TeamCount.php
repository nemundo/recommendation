<?php
namespace Nemundo\Content\App\Team\Data\Team;
class TeamCount extends \Nemundo\Model\Count\AbstractModelDataCount {
/**
* @var TeamModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new TeamModel();
}
}