<?php
namespace Nemundo\User\Data\UserUsergroup;
class UserUsergroupPaginationReader extends \Nemundo\Model\Reader\AbstractPaginationModelDataReader {
/**
* @var UserUsergroupModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new UserUsergroupModel();
}
/**
* @return UserUsergroupRow[]
*/
public function getData() {
$list = [];
foreach (parent::getData() as $dataRow) {
$row = new UserUsergroupRow($dataRow, $this->model);
$list[] = $row;
}
return $list;
}
}