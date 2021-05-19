<?php
namespace Nemundo\Content\App\Subscription\Data\Subscription;
class SubscriptionPaginationReader extends \Nemundo\Model\Reader\AbstractPaginationModelDataReader {
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
$row = new SubscriptionRow($dataRow, $this->model);
$list[] = $row;
}
return $list;
}
}