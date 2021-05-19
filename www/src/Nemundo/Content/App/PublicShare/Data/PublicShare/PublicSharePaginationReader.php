<?php
namespace Nemundo\Content\App\PublicShare\Data\PublicShare;
class PublicSharePaginationReader extends \Nemundo\Model\Reader\AbstractPaginationModelDataReader {
/**
* @var PublicShareModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new PublicShareModel();
}
/**
* @return PublicShareRow[]
*/
public function getData() {
$list = [];
foreach (parent::getData() as $dataRow) {
$row = new PublicShareRow($dataRow, $this->model);
$list[] = $row;
}
return $list;
}
}