<?php
namespace Hackathon\Data\Keyword;
class KeywordValue extends \Nemundo\Model\Value\AbstractModelDataValue {
/**
* @var KeywordModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new KeywordModel();
}
}