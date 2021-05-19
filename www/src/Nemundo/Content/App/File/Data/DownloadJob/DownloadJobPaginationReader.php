<?php
namespace Nemundo\Content\App\File\Data\DownloadJob;
class DownloadJobPaginationReader extends \Nemundo\Model\Reader\AbstractPaginationModelDataReader {
/**
* @var DownloadJobModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new DownloadJobModel();
}
/**
* @return DownloadJobRow[]
*/
public function getData() {
$list = [];
foreach (parent::getData() as $dataRow) {
$row = new DownloadJobRow($dataRow, $this->model);
$list[] = $row;
}
return $list;
}
}