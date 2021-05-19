<?php
namespace Hackathon\Data\BajourArticle;
class BajourArticleDelete extends \Nemundo\Model\Delete\AbstractModelDelete {
/**
* @var BajourArticleModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new BajourArticleModel();
}
}