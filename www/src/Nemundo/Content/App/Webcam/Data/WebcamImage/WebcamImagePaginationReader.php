<?php
namespace Nemundo\Content\App\Webcam\Data\WebcamImage;
class WebcamImagePaginationReader extends \Nemundo\Model\Reader\AbstractPaginationModelDataReader {
/**
* @var WebcamImageModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new WebcamImageModel();
}
/**
* @return WebcamImageRow[]
*/
public function getData() {
$list = [];
foreach (parent::getData() as $dataRow) {
$row = new WebcamImageRow($dataRow, $this->model);
$list[] = $row;
}
return $list;
}
}