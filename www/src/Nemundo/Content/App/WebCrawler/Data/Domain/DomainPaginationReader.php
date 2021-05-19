<?php
namespace Nemundo\Content\App\WebCrawler\Data\Domain;
class DomainPaginationReader extends \Nemundo\Model\Reader\AbstractPaginationModelDataReader {
/**
* @var DomainModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new DomainModel();
}
/**
* @return DomainRow[]
*/
public function getData() {
$list = [];
foreach (parent::getData() as $dataRow) {
$row = new DomainRow($dataRow, $this->model);
$list[] = $row;
}
return $list;
}
}