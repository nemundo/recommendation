<?php
namespace Nemundo\Srf\Data\MediaType;
class MediaTypePaginationReader extends \Nemundo\Model\Reader\AbstractPaginationModelDataReader {
/**
* @var MediaTypeModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new MediaTypeModel();
}
/**
* @return MediaTypeRow[]
*/
public function getData() {
$list = [];
foreach (parent::getData() as $dataRow) {
$row = new MediaTypeRow($dataRow, $this->model);
$list[] = $row;
}
return $list;
}
}