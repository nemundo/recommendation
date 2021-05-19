<?php
namespace Nemundo\Content\App\Feed\Data\Enclosure;
class EnclosurePaginationReader extends \Nemundo\Model\Reader\AbstractPaginationModelDataReader {
/**
* @var EnclosureModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new EnclosureModel();
}
/**
* @return EnclosureRow[]
*/
public function getData() {
$list = [];
foreach (parent::getData() as $dataRow) {
$row = new EnclosureRow($dataRow, $this->model);
$list[] = $row;
}
return $list;
}
}