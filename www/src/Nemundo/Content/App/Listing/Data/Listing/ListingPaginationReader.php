<?php
namespace Nemundo\Content\App\Listing\Data\Listing;
class ListingPaginationReader extends \Nemundo\Model\Reader\AbstractPaginationModelDataReader {
/**
* @var ListingModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new ListingModel();
}
/**
* @return ListingRow[]
*/
public function getData() {
$list = [];
foreach (parent::getData() as $dataRow) {
$row = new ListingRow($dataRow, $this->model);
$list[] = $row;
}
return $list;
}
}