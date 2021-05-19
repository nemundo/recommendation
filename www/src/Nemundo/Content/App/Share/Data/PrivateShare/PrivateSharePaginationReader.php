<?php
namespace Nemundo\Content\App\Share\Data\PrivateShare;
class PrivateSharePaginationReader extends \Nemundo\Model\Reader\AbstractPaginationModelDataReader {
/**
* @var PrivateShareModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new PrivateShareModel();
}
/**
* @return PrivateShareRow[]
*/
public function getData() {
$list = [];
foreach (parent::getData() as $dataRow) {
$row = new PrivateShareRow($dataRow, $this->model);
$list[] = $row;
}
return $list;
}
}