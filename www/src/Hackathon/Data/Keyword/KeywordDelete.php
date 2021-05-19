<?php
namespace Hackathon\Data\Keyword;
class KeywordDelete extends \Nemundo\Model\Delete\AbstractModelDelete {
/**
* @var KeywordModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new KeywordModel();
}
}