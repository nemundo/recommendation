<?php
namespace Nemundo\Content\App\Feed\Data\EnclosureType;
class EnclosureTypePaginationReader extends \Nemundo\Model\Reader\AbstractPaginationModelDataReader {
/**
* @var EnclosureTypeModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new EnclosureTypeModel();
}
/**
* @return EnclosureTypeRow[]
*/
public function getData() {
$list = [];
foreach (parent::getData() as $dataRow) {
$row = new EnclosureTypeRow($dataRow, $this->model);
$list[] = $row;
}
return $list;
}
}