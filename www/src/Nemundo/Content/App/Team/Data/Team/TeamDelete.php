<?php
namespace Nemundo\Content\App\Team\Data\Team;
class TeamDelete extends \Nemundo\Model\Delete\AbstractModelDelete {
/**
* @var TeamModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new TeamModel();
}
}