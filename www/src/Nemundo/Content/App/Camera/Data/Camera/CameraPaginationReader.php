<?php
namespace Nemundo\Content\App\Camera\Data\Camera;
class CameraPaginationReader extends \Nemundo\Model\Reader\AbstractPaginationModelDataReader {
/**
* @var CameraModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new CameraModel();
}
/**
* @return CameraRow[]
*/
public function getData() {
$list = [];
foreach (parent::getData() as $dataRow) {
$row = new CameraRow($dataRow, $this->model);
$list[] = $row;
}
return $list;
}
}