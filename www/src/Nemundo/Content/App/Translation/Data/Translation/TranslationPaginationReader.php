<?php
namespace Nemundo\Content\App\Translation\Data\Translation;
class TranslationPaginationReader extends \Nemundo\Model\Reader\AbstractPaginationModelDataReader {
/**
* @var TranslationModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new TranslationModel();
}
/**
* @return TranslationRow[]
*/
public function getData() {
$list = [];
foreach (parent::getData() as $dataRow) {
$row = new TranslationRow($dataRow, $this->model);
$list[] = $row;
}
return $list;
}
}