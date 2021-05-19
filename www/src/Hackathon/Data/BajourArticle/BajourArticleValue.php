<?php
namespace Hackathon\Data\BajourArticle;
class BajourArticleValue extends \Nemundo\Model\Value\AbstractModelDataValue {
/**
* @var BajourArticleModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new BajourArticleModel();
}
}