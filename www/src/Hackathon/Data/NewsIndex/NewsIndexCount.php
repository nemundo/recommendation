<?php
namespace Hackathon\Data\NewsIndex;
class NewsIndexCount extends \Nemundo\Model\Count\AbstractModelDataCount {
/**
* @var NewsIndexModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new NewsIndexModel();
}
}