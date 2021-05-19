<?php
namespace Nemundo\Content\App\Team\Data\Team;
class TeamPaginationReader extends \Nemundo\Model\Reader\AbstractPaginationModelDataReader {
/**
* @var TeamModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new TeamModel();
}
/**
* @return TeamRow[]
*/
public function getData() {
$list = [];
foreach (parent::getData() as $dataRow) {
$row = new TeamRow($dataRow, $this->model);
$list[] = $row;
}
return $list;
}
}