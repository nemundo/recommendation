<?php
namespace Hackathon\Data\RssFeed;
class RssFeedPaginationReader extends \Nemundo\Model\Reader\AbstractPaginationModelDataReader {
/**
* @var RssFeedModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new RssFeedModel();
}
/**
* @return RssFeedRow[]
*/
public function getData() {
$list = [];
foreach (parent::getData() as $dataRow) {
$row = new RssFeedRow($dataRow, $this->model);
$list[] = $row;
}
return $list;
}
}