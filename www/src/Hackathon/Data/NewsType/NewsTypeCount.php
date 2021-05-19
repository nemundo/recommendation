<?php
namespace Hackathon\Data\NewsType;
class NewsTypeCount extends \Nemundo\Model\Count\AbstractModelDataCount {
/**
* @var NewsTypeModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new NewsTypeModel();
}
}