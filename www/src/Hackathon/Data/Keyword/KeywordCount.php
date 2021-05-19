<?php
namespace Hackathon\Data\Keyword;
class KeywordCount extends \Nemundo\Model\Count\AbstractModelDataCount {
/**
* @var KeywordModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new KeywordModel();
}
}