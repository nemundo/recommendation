<?php
namespace Nemundo\Content\App\Video\Data\Vimeo;
class VimeoPaginationReader extends \Nemundo\Model\Reader\AbstractPaginationModelDataReader {
/**
* @var VimeoModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new VimeoModel();
}
/**
* @return VimeoRow[]
*/
public function getData() {
$list = [];
foreach (parent::getData() as $dataRow) {
$row = new VimeoRow($dataRow, $this->model);
$list[] = $row;
}
return $list;
}
}