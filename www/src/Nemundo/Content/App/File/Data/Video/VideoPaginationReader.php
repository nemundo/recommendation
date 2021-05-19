<?php
namespace Nemundo\Content\App\File\Data\Video;
class VideoPaginationReader extends \Nemundo\Model\Reader\AbstractPaginationModelDataReader {
/**
* @var VideoModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new VideoModel();
}
/**
* @return VideoRow[]
*/
public function getData() {
$list = [];
foreach (parent::getData() as $dataRow) {
$row = new VideoRow($dataRow, $this->model);
$list[] = $row;
}
return $list;
}
}