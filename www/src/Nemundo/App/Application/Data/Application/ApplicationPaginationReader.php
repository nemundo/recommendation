<?php
namespace Nemundo\App\Application\Data\Application;
class ApplicationPaginationReader extends \Nemundo\Model\Reader\AbstractPaginationModelDataReader {
/**
* @var ApplicationModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new ApplicationModel();
}
/**
* @return \Nemundo\App\Application\Row\ApplicationCustomRow[]
*/
public function getData() {
$list = [];
foreach (parent::getData() as $dataRow) {
$row = new \Nemundo\App\Application\Row\ApplicationCustomRow($dataRow, $this->model);
$list[] = $row;
}
return $list;
}
}