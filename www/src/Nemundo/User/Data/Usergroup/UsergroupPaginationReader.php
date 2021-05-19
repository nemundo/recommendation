<?php
namespace Nemundo\User\Data\Usergroup;
class UsergroupPaginationReader extends \Nemundo\Model\Reader\AbstractPaginationModelDataReader {
/**
* @var UsergroupModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new UsergroupModel();
}
/**
* @return UsergroupRow[]
*/
public function getData() {
$list = [];
foreach (parent::getData() as $dataRow) {
$row = new UsergroupRow($dataRow, $this->model);
$list[] = $row;
}
return $list;
}
}