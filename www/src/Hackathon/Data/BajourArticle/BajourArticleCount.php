<?php
namespace Hackathon\Data\BajourArticle;
class BajourArticleCount extends \Nemundo\Model\Count\AbstractModelDataCount {
/**
* @var BajourArticleModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new BajourArticleModel();
}
}