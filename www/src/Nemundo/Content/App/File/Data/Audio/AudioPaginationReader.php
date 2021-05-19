<?php
namespace Nemundo\Content\App\File\Data\Audio;
class AudioPaginationReader extends \Nemundo\Model\Reader\AbstractPaginationModelDataReader {
/**
* @var AudioModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new AudioModel();
}
/**
* @return AudioRow[]
*/
public function getData() {
$list = [];
foreach (parent::getData() as $dataRow) {
$row = new AudioRow($dataRow, $this->model);
$list[] = $row;
}
return $list;
}
}