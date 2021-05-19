<?php
namespace Nemundo\Content\App\Contact\Data\Phone;
class PhonePaginationReader extends \Nemundo\Model\Reader\AbstractPaginationModelDataReader {
/**
* @var PhoneModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new PhoneModel();
}
/**
* @return PhoneRow[]
*/
public function getData() {
$list = [];
foreach (parent::getData() as $dataRow) {
$row = new PhoneRow($dataRow, $this->model);
$list[] = $row;
}
return $list;
}
}