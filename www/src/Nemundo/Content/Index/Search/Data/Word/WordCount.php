<?php
namespace Nemundo\Content\Index\Search\Data\Word;
class WordCount extends \Nemundo\Model\Count\AbstractModelDataCount {
/**
* @var WordModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new WordModel();
}
}