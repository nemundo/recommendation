<?php
namespace Nemundo\Content\App\Video\Data\IframeVideo;
class IframeVideoPaginationReader extends \Nemundo\Model\Reader\AbstractPaginationModelDataReader {
/**
* @var IframeVideoModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new IframeVideoModel();
}
/**
* @return IframeVideoRow[]
*/
public function getData() {
$list = [];
foreach (parent::getData() as $dataRow) {
$row = new IframeVideoRow($dataRow, $this->model);
$list[] = $row;
}
return $list;
}
}