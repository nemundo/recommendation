<?php
namespace Nemundo\Content\App\Translation\Data\TextTranslation;
class TextTranslationPaginationReader extends \Nemundo\Model\Reader\AbstractPaginationModelDataReader {
/**
* @var TextTranslationModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new TextTranslationModel();
}
/**
* @return TextTranslationRow[]
*/
public function getData() {
$list = [];
foreach (parent::getData() as $dataRow) {
$row = new TextTranslationRow($dataRow, $this->model);
$list[] = $row;
}
return $list;
}
}