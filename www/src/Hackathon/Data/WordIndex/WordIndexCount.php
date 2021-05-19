<?php
namespace Hackathon\Data\WordIndex;
class WordIndexCount extends \Nemundo\Model\Count\AbstractModelDataCount {
/**
* @var WordIndexModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new WordIndexModel();
}
}