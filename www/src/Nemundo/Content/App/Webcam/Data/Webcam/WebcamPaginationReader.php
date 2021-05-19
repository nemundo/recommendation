<?php
namespace Nemundo\Content\App\Webcam\Data\Webcam;
class WebcamPaginationReader extends \Nemundo\Model\Reader\AbstractPaginationModelDataReader {
/**
* @var WebcamModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new WebcamModel();
}
/**
* @return \Nemundo\Content\App\Webcam\Row\WebcamCustomRow[]
*/
public function getData() {
$list = [];
foreach (parent::getData() as $dataRow) {
$row = new \Nemundo\Content\App\Webcam\Row\WebcamCustomRow($dataRow, $this->model);
$list[] = $row;
}
return $list;
}
}