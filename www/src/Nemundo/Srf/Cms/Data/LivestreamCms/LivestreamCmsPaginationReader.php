<?php
namespace Nemundo\Srf\Cms\Data\LivestreamCms;
class LivestreamCmsPaginationReader extends \Nemundo\Model\Reader\AbstractPaginationModelDataReader {
/**
* @var LivestreamCmsModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new LivestreamCmsModel();
}
/**
* @return LivestreamCmsRow[]
*/
public function getData() {
$list = [];
foreach (parent::getData() as $dataRow) {
$row = new LivestreamCmsRow($dataRow, $this->model);
$list[] = $row;
}
return $list;
}
}