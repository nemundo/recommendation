<?php
namespace Nemundo\Content\App\Subscription\Data\Subscription;
class SubscriptionReader extends \Nemundo\Model\Reader\ModelDataReader {
/**
* @var SubscriptionModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new SubscriptionModel();
}
/**
* @return SubscriptionRow[]
*/
public function getData() {
$list = [];
foreach (parent::getData() as $dataRow) {
$row = $this->getModelRow($dataRow);
$list[] = $row;
}
return $list;
}
/**
* @return SubscriptionRow
*/
public function getRow() {
$dataRow = parent::getRow();
$row = $this->getModelRow($dataRow);
return $row;
}
/**
* @return SubscriptionRow
*/
public function getRowById($id) {
return parent::getRowById($id);
}
private function getModelRow($dataRow) {
$row = new SubscriptionRow($dataRow, $this->model);
$row->model = $this->model;
return $row;
}
}