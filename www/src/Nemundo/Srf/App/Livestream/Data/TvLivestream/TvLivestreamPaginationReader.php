<?php
namespace Nemundo\Srf\App\Livestream\Data\TvLivestream;
class TvLivestreamPaginationReader extends \Nemundo\Model\Reader\AbstractPaginationModelDataReader {
/**
* @var TvLivestreamModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new TvLivestreamModel();
}
/**
* @return TvLivestreamRow[]
*/
public function getData() {
$list = [];
foreach (parent::getData() as $dataRow) {
$row = new TvLivestreamRow($dataRow, $this->model);
$list[] = $row;
}
return $list;
}
}