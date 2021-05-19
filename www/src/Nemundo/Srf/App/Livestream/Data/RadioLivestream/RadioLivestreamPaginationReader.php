<?php
namespace Nemundo\Srf\App\Livestream\Data\RadioLivestream;
class RadioLivestreamPaginationReader extends \Nemundo\Model\Reader\AbstractPaginationModelDataReader {
/**
* @var RadioLivestreamModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new RadioLivestreamModel();
}
/**
* @return RadioLivestreamRow[]
*/
public function getData() {
$list = [];
foreach (parent::getData() as $dataRow) {
$row = new RadioLivestreamRow($dataRow, $this->model);
$list[] = $row;
}
return $list;
}
}