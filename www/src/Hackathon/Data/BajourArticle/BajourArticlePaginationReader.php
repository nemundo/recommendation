<?php
namespace Hackathon\Data\BajourArticle;
class BajourArticlePaginationReader extends \Nemundo\Model\Reader\AbstractPaginationModelDataReader {
/**
* @var BajourArticleModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new BajourArticleModel();
}
/**
* @return BajourArticleRow[]
*/
public function getData() {
$list = [];
foreach (parent::getData() as $dataRow) {
$row = new BajourArticleRow($dataRow, $this->model);
$list[] = $row;
}
return $list;
}
}