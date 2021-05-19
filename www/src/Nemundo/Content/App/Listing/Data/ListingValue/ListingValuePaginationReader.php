<?php
namespace Nemundo\Content\App\Listing\Data\ListingValue;
class ListingValuePaginationReader extends \Nemundo\Model\Reader\AbstractPaginationModelDataReader {
/**
* @var ListingValueModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new ListingValueModel();
}
/**
* @return ListingValueRow[]
*/
public function getData() {
$list = [];
foreach (parent::getData() as $dataRow) {
$row = new ListingValueRow($dataRow, $this->model);
$list[] = $row;
}
return $list;
}
}