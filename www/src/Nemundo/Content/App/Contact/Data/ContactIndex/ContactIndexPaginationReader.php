<?php
namespace Nemundo\Content\App\Contact\Data\ContactIndex;
class ContactIndexPaginationReader extends \Nemundo\Model\Reader\AbstractPaginationModelDataReader {
/**
* @var ContactIndexModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new ContactIndexModel();
}
/**
* @return ContactIndexRow[]
*/
public function getData() {
$list = [];
foreach (parent::getData() as $dataRow) {
$row = new ContactIndexRow($dataRow, $this->model);
$list[] = $row;
}
return $list;
}
}