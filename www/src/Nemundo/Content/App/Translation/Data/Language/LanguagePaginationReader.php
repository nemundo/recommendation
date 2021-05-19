<?php
namespace Nemundo\Content\App\Translation\Data\Language;
class LanguagePaginationReader extends \Nemundo\Model\Reader\AbstractPaginationModelDataReader {
/**
* @var LanguageModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new LanguageModel();
}
/**
* @return \Nemundo\Content\App\Translation\Row\LanguageCustomRow[]
*/
public function getData() {
$list = [];
foreach (parent::getData() as $dataRow) {
$row = new \Nemundo\Content\App\Translation\Row\LanguageCustomRow($dataRow, $this->model);
$list[] = $row;
}
return $list;
}
}