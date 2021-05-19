<?php
namespace Hackathon\Data\BajourArticle;
use Nemundo\Model\Id\AbstractModelIdValue;
class BajourArticleId extends AbstractModelIdValue {
/**
* @var BajourArticleModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new BajourArticleModel();
}
}