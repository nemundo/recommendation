<?php
namespace Nemundo\Content\App\Team\Data\Team;
use Nemundo\Model\Id\AbstractModelIdValue;
class TeamId extends AbstractModelIdValue {
/**
* @var TeamModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new TeamModel();
}
}